<?php
namespace api\common\models;

/**
 * api User model
 */
class User extends common\models\User
{
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user_id = Yii::$app->cache->get($token);
        return ($user_id) ? new static(['id' => $user_id]) : null;
    }
}