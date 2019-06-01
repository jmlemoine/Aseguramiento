<?php

namespace backend\models;

use \backend\models\base\Sala as BaseSala;

/**
 * This is the model class for table "sala".
 */
class Sala extends BaseSala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Nombre_Sala'], 'required'],
            [['Nombre_Sala'], 'string', 'max' => 20]
        ]);
    }
	
}
