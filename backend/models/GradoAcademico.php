<?php

namespace backend\models;

use \backend\models\base\GradoAcademico as BaseGradoAcademico;

/**
 * This is the model class for table "grado_academico".
 */
class GradoAcademico extends BaseGradoAcademico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Grado'], 'string', 'max' => 50]
        ]);
    }
	
}
