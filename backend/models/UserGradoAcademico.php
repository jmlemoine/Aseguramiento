<?php

namespace backend\models;

use Yii;
use \backend\models\base\UserGradoAcademico as BaseUserGradoAcademico;

/**
 * This is the model class for table "user_grado_academico".
 */
class UserGradoAcademico extends BaseUserGradoAcademico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'grado_academico_id'], 'required'],
            [['user_id', 'grado_academico_id'], 'integer']
        ]);
    }
	
}
