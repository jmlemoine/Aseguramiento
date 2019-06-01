<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base model class for table "{{%presentacion_user}}".
 *
 * @property integer $presentacion_id
 * @property integer $user_id
 * @property integer $estado_notificacion
 * @property string $comentario 
 *
 * @property \backend\models\Presentacion $presentacion
 * @property \backend\models\User $user
 */
class PresentacionUser extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'presentacion',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presentacion_id', 'user_id'], 'required'],
            [['presentacion_id', 'user_id', 'estado_notificacion'], 'integer'],
            [['comentario'], 'string'],
            //[['estado_notificacion'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%presentacion_user}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'presentacion_id' => Yii::t('app', 'Presentacion'),
            'user_id' => Yii::t('app', 'Usuario'),
            'estado_notificacion' => Yii::t('app', 'Notificacion'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacion()
    {
        return $this->hasOne(\backend\models\Presentacion::className(), ['id' => 'presentacion_id']);
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
     * @return \backend\models\PresentacionUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\PresentacionUserQuery(get_called_class());
    }
}
