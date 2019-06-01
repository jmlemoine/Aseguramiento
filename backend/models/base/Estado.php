<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%estado}}".
 *
 * @property integer $id
 * @property string $Estado
 *
 * @property \backend\models\Presentacion[] $presentacions
 */
class Estado extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presentacions'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estado'], 'required'],
            [['Estado'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%estado}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Estado' => Yii::t('app', 'Estado'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(\backend\models\Presentacion::className(), ['estado_id' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\EstadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\EstadoQuery(get_called_class());
    }
}
