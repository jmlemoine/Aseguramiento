<?php

namespace backend\models;

use Yii;
use \backend\models\base\Pais as BasePais;

/**
 * This is the model class for table "pais".
 */
class Pais extends BasePais
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Pais'], 'string', 'max' => 255]
        ]);
    }
	
}
