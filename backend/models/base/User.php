<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base model class for table "{{%user}}".
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
 * @property resource $Foto
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
 */
class User extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presentacionUsers',
            'presentacions',
            'afiliacion',
            'pais',
            'tipoUser',
            'userAreaEspecializacions',
            'areaEspecializacions',
            'userGradoAcademicos',
            'gradoAcademicos',
            'userSalas',
            'salas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellido', 'username', 'Sexo', 'Fecha_Nacimiento', 'password_hash', 'auth_key'], 'required'],
            [['afiliacion_id', 'tipo_user_id', 'pais_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['Sexo', 'Foto'], 'string'],
            [['Fecha_Nacimiento'], 'safe'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['email', 'filename', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['Telefono'], 'string', 'max' => 20],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'Apellido' => Yii::t('app', 'Apellido'),
            'afiliacion_id' => Yii::t('app', 'Afiliacion'),
            'tipo_user_id' => Yii::t('app', 'Tipo Usuario'),
            'pais_id' => Yii::t('app', 'Pais'),
            'username' => Yii::t('app', 'Usuario'),
            'email' => Yii::t('app', 'Email'),
            'Telefono' => Yii::t('app', 'Telefono'),
            'Sexo' => Yii::t('app', 'Sexo'),
            'Fecha_Nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'Foto' => Yii::t('app', 'perfil'),
            'filename' => Yii::t('app', 'Filename'),
            'password_hash' => Yii::t('app', 'contrasena'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'estado'),
            'auth_key' => Yii::t('app', 'Auth Key'),
        ];
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
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return \backend\models\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UserQuery(get_called_class());
    }
}
