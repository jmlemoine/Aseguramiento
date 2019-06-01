<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%provincia}}".
 *
 * @property integer $id
 * @property integer $pais_id
 * @property string $Provincia
 *
 * @property \backend\models\Congreso[] $congresos
 * @property \backend\models\Pais $pais
 */
class Provincia extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pais_id', 'Provincia'], 'required'],
            [['pais_id'], 'integer'],
            [['Provincia'], 'string', 'max' => 100]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%provincia}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pais_id' => Yii::t('app', 'Pais'),
            'Provincia' => Yii::t('app', 'Provincia'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongresos()
    {
        return $this->hasMany(\backend\models\Congreso::className(), ['provincia_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(\backend\models\Pais::className(), ['id' => 'pais_id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\ProvinciaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\ProvinciaQuery(get_called_class());
    }
}
