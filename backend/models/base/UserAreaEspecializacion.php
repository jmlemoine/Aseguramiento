<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%user_area_especializacion}}".
 *
 * @property integer $user_id
 * @property integer $area_especializacion_id
 *
 * @property \backend\models\AreaEspecializacion $areaEspecializacion
 * @property \backend\models\User $user
 */
class UserAreaEspecializacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'areaEspecializacion',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'area_especializacion_id'], 'required'],
            [['user_id', 'area_especializacion_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_area_especializacion}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'Usuario'),
            'area_especializacion_id' => Yii::t('app', 'Area de especializacion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaEspecializacion()
    {
        return $this->hasOne(\backend\models\AreaEspecializacion::className(), ['id' => 'area_especializacion_id']);
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
     * @return \backend\models\UserAreaEspecializacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UserAreaEspecializacionQuery(get_called_class());
    }
}
