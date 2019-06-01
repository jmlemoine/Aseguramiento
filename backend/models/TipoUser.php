<?php

namespace backend\models;

use Yii;
use \backend\models\base\TipoUser as BaseTipoUser;

/**
 * This is the model class for table "tipo_user".
 */
class TipoUser extends BaseTipoUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['Tipo'], 'string', 'max' => 15],
            [['Tipo'], 'unique']
        ]);
    }
	
}
