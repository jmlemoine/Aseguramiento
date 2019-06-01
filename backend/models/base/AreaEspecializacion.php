<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%area_especializacion}}".
 *
 * @property integer $id
 * @property string $area
 *
 * @property \backend\models\UserAreaEspecializacion[] $userAreaEspecializacions
 * @property \backend\models\User[] $users
 */
class AreaEspecializacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['area'], 'required'],
            [['area'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%area_especializacion}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'area' => Yii::t('app', 'Area de especializacion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAreaEspecializacions()
    {
        return $this->hasMany(\backend\models\UserAreaEspecializacion::className(), ['area_especializacion_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['id' => 'user_id'])->viaTable('{{%user_area_especializacion}}', ['area_especializacion_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\AreaEspecializacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\AreaEspecializacionQuery(get_called_class());
    }
}
