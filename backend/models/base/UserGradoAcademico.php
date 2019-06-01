<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%user_grado_academico}}".
 *
 * @property integer $user_id
 * @property integer $grado_academico_id
 *
 * @property \backend\models\GradoAcademico $gradoAcademico
 * @property \backend\models\User $user
 */
class UserGradoAcademico extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'gradoAcademico',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'grado_academico_id'], 'required'],
            [['user_id', 'grado_academico_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_grado_academico}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'Usuario'),
            'grado_academico_id' => Yii::t('app', 'Grado Academico'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradoAcademico()
    {
        return $this->hasOne(\backend\models\GradoAcademico::className(), ['id' => 'grado_academico_id']);
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
     * @return \backend\models\UserGradoAcademicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\UserGradoAcademicoQuery(get_called_class());
    }
}
