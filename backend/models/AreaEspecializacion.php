<?php

namespace backend\models;

use \backend\models\base\AreaEspecializacion as BaseAreaEspecializacion;

/**
 * This is the model class for table "area_especializacion".
 */
class AreaEspecializacion extends BaseAreaEspecializacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['area'], 'required'],
            [['area'], 'string', 'max' => 50]
        ]);
    }
	
}
