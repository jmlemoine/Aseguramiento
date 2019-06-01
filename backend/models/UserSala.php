<?php

namespace backend\models;

use Yii;
use \backend\models\base\UserSala as BaseUserSala;

/**
 * This is the model class for table "user_sala".
 */
class UserSala extends BaseUserSala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'sala_id'], 'required'],
            [['user_id', 'sala_id'], 'integer']
        ]);
    }
	
}
