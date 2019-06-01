<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%user_sala}}".
 *
 * @property integer $user_id
 * @property integer $sala_id
 *
 * @property \backend\models\Sala $sala
 * @property \backend\models\User $user
 */
class UserSala extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'sala',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sala_id'], 'required'],
            [['user_id', 'sala_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_sala}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'Usuario'),
            'sala_id' => Yii::t('app', 'Sala'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSala()
    {
        return $this->hasOne(\backend\models\Sala::className(), ['id' => 'sala_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\models\User::className(), ['id' => 'user_id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\UserSalaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UserSalaQuery(get_called_class());
    }
}
