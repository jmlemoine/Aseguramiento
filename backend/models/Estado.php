<?php

namespace backend\models;

use Yii;
use \backend\models\base\Estado as BaseEstado;

/**
 * This is the model class for table "estado".
 */
class Estado extends BaseEstado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Estado'], 'required'],
            [['Estado'], 'string', 'max' => 11]
        ]);
    }
	
}
