<?php
namespace backend\rbac;

use Yii;
use yii\rbac\Rule;

/**
 * Checks if user group matches
 */
class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $group = Yii::$app->user->identity->tipo_user_id;
            if ($item->name === 'admin') {
                return $group == 1;
            } elseif ($item->name === 'moderador') {
                return $group == 2;
            } elseif ($item->name === 'presentador') {
                return $group == 3;
            } elseif ($item->name === 'participante') {
                return $group == 4;
            }
        }
        return false;
    }
}