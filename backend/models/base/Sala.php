<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%sala}}".
 *
 * @property integer $id
 * @property string $Nombre_Sala
 *
 * @property \backend\models\Presentacion[] $presentacions
 * @property \backend\models\UserSala[] $userSalas
 * @property \backend\models\User[] $users
 */
class Sala extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre_Sala'], 'required'],
            [['Nombre_Sala'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sala}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Nombre_Sala' => Yii::t('app', 'Sala'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(\backend\models\Presentacion::className(), ['sala_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSalas()
    {
        return $this->hasMany(\backend\models\UserSala::className(), ['sala_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['id' => 'user_id'])->viaTable('{{%user_sala}}', ['sala_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\SalaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\SalaQuery(get_called_class());
    }
}
