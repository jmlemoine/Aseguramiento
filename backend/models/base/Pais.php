<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%pais}}".
 *
 * @property integer $id
 * @property string $Pais
 *
 * @property \backend\models\Provincia[] $provincias
 * @property \backend\models\User[] $users
 */
class Pais extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'provincias',
            'users'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Pais'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pais}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Pais' => Yii::t('app', 'Pais'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincias()
    {
        return $this->hasMany(\backend\models\Provincia::className(), ['pais_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['pais_id' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \backend\models\PaisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PaisQuery(get_called_class());
    }
}
