<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "moderador".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 *
 * @property Conferencia[] $conferencias
 */
class Moderador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moderador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 255],
            [['apellido'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferencias()
    {
        return $this->hasMany(Conferencia::className(), ['moderador_id' => 'id']);
    }
}
