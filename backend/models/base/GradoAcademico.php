<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%grado_academico}}".
 *
 * @property integer $id
 * @property string $Grado
 *
 * @property \backend\models\UserGradoAcademico[] $userGradoAcademicos
 * @property \backend\models\User[] $users
 */
class GradoAcademico extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Grado'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%grado_academico}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Grado' => Yii::t('app', 'Grado'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserGradoAcademicos()
    {
        return $this->hasMany(\backend\models\UserGradoAcademico::className(), ['grado_academico_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\backend\models\User::className(), ['id' => 'user_id'])->viaTable('{{%user_grado_academico}}', ['grado_academico_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return \backend\models\GradoAcademicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\GradoAcademicoQuery(get_called_class());
    }
}
