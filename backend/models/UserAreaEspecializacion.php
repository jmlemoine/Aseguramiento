<?php

namespace backend\models;

use Yii;
use \backend\models\base\UserAreaEspecializacion as BaseUserAreaEspecializacion;

/**
 * This is the model class for table "user_area_especializacion".
 */
class UserAreaEspecializacion extends BaseUserAreaEspecializacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'area_especializacion_id'], 'required'],
            [['user_id', 'area_especializacion_id'], 'integer']
        ]);
    }
	
}
