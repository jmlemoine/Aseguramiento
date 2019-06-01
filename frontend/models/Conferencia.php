<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "conferencia".
 *
 * @property int $id
 * @property int $moderador_id
 * @property string $tema
 *
 * @property Moderador $moderador
 */
class Conferencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conferencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['moderador_id'], 'required'],
            [['moderador_id'], 'integer'],
            [['tema'], 'string', 'max' => 100],
            [['moderador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Moderador::className(), 'targetAttribute' => ['moderador_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'moderador_id' => 'Moderador ID',
            'tema' => 'Tema',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModerador()
    {
        return $this->hasOne(Moderador::className(), ['id' => 'moderador_id']);
    }
}
