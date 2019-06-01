<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%tipo_user}}".
 *
 * @property integer $id
 * @property string $Tipo
 *
 * @property \backend\models\User[] $users
 */
class TipoUser extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'users'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Tipo'], 'string', 'max' => 15],
            [['Tipo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tipo_user}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Tipo' => Yii::t('app', 'Tipo'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['tipo_user_id' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\TipoUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\TipoUserQuery(get_called_class());
    }
}
