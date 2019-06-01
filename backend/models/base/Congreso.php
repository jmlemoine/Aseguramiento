<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%congreso}}".
 *
 * @property integer $id
 * @property integer $provincia_id
 * @property string $Nombre
 * @property string $Fecha_Inicio
 * @property string $Fecha_Final
 *
 * @property \backend\models\Provincia $provincia
 * @property \backend\models\Presentacion[] $presentacions
 */
class Congreso extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provincia_id', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['provincia_id'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final'], 'safe'],
            [['Nombre'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%congreso}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'provincia_id' => Yii::t('app', 'Provincia'),
            'Nombre' => Yii::t('app', 'Nombre'),
            'Fecha_Inicio' => Yii::t('app', 'Fecha  Inicio'),
            'Fecha_Final' => Yii::t('app', 'Fecha  Final'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(\backend\models\Provincia::className(), ['id' => 'provincia_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(\backend\models\Presentacion::className(), ['congreso_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\CongresoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\CongresoQuery(get_called_class());
    }
}
