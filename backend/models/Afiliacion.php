<?php

namespace backend\models;

use \backend\models\base\Afiliacion as BaseAfiliacion;

/**
 * This is the model class for table "afiliacion".
 */
class Afiliacion extends BaseAfiliacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Afiliacion'], 'string', 'max' => 50]
        ]);
    }
	
}
