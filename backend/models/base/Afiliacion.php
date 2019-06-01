<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%afiliacion}}".
 *
 * @property integer $id
 * @property string $Afiliacion
 *
 * @property \backend\models\User[] $users
 */
class Afiliacion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Afiliacion'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%afiliacion}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Afiliacion' => Yii::t('app', 'Afiliacion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['afiliacion_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\AfiliacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\AfiliacionQuery(get_called_class());
    }
}
