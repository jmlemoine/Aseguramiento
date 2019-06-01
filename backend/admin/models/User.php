<?php

namespace backend\admin\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use backend\admin\components\Configs;

/**
 * User model
 *
 * @property integer $id
 * @property string $Nombre
 * @property string $Apellido
 * @property integer $afiliacion_id
 * @property integer $tipo_user_id
 * @property integer $pais_id
 * @property string $username
 * @property string $email
 * @property string $Telefono
 * @property string $Sexo
 * @property string $Fecha_Nacimiento
 * @property array $Foto
 * @property string $filename
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \backend\models\PresentacionUser[] $presentacionUsers
 * @property \backend\models\Presentacion[] $presentacions
 * @property \backend\models\Afiliacion $afiliacion
 * @property \backend\models\Pais $pais
 * @property \backend\models\TipoUser $tipoUser
 * @property \backend\models\UserAreaEspecializacion[] $userAreaEspecializacions
 * @property \backend\models\AreaEspecializacion[] $areaEspecializacions
 * @property \backend\models\UserGradoAcademico[] $userGradoAcademicos
 * @property \backend\models\GradoAcademico[] $gradoAcademicos
 * @property \backend\models\UserSala[] $userSalas
 * @property \backend\models\Sala[] $salas
 * 
 * @property UserProfile $profile
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->userTable;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                'password_reset_token' => $token,
                'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

   /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacionUsers()
    {
        return $this->hasMany(\backend\models\PresentacionUser::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(\backend\models\Presentacion::className(), ['id' => 'presentacion_id'])->viaTable('{{%presentacion_user}}', ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAfiliacion()
    {
        return $this->hasOne(\backend\models\Afiliacion::className(), ['id' => 'afiliacion_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(\backend\models\Pais::className(), ['id' => 'pais_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoUser()
    {
        return $this->hasOne(\backend\models\TipoUser::className(), ['id' => 'tipo_user_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAreaEspecializacions()
    {
        return $this->hasMany(\backend\models\UserAreaEspecializacion::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaEspecializacions()
    {
        return $this->hasMany(\backend\models\AreaEspecializacion::className(), ['id' => 'area_especializacion_id'])->viaTable('{{%user_area_especializacion}}', ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGradoAcademicos()
    {
        return $this->hasMany(\backend\models\UserGradoAcademico::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoAcademicos()
    {
        return $this->hasMany(\backend\models\GradoAcademico::className(), ['id' => 'grado_academico_id'])->viaTable('{{%user_grado_academico}}', ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSalas()
    {
        return $this->hasMany(\backend\models\UserSala::className(), ['user_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalas()
    {
        return $this->hasMany(\backend\models\Sala::className(), ['id' => 'sala_id'])->viaTable('{{%user_sala}}', ['user_id' => 'id']);
    }

    /**
     * fetch stored image file name with complete path 
     * @return string
     */
    public function getImageFile() 
    {
        return isset($this->Foto) ? Yii::$app->basePath . '/perfil/' . $this->Foto : null;
        
    }

    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl() 
    {
        // return a default image placeholder if your source avatar is not found
        $Foto = isset($this->Foto) ? $this->Foto : 'default_user.jpg';
        return Yii::$app->basePath . '/perfil/' . $Foto;
    }

    public static function getDb()
    {
        return Configs::userDb();
    }
}
