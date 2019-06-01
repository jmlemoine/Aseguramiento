<?php

namespace backend\models;

use Yii;
use \backend\models\base\User as BaseUser;

/**
 * This is the model class for table "user".
 */
class User extends BaseUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Nombre', 'Apellido', 'username', 'Sexo', 'Fecha_Nacimiento', 'password_hash', 'auth_key'], 'required'],
            [['afiliacion_id', 'tipo_user_id', 'pais_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['Sexo', 'Foto'], 'string'],
            [['Fecha_Nacimiento'], 'safe'],
            [['Nombre', 'Apellido'], 'string', 'max' => 50],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['email', 'filename', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['Telefono'], 'string', 'max' => 20],
            [['email'], 'unique']
        ]);
    }
	
}
