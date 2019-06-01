<?php
namespace auth\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\base\NotSupportedException;

/**
 * User model
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return \common\models\User::findOne(['id' => $id, 'status' => \common\models\User::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	$auth = static::findOne(['refresh_token' => $token]);
    	return ($auth && $auth->isValid()) ? static::findIdentity($auth->user_id) : null;
    }

    /**
     * Validates Refresh Token LifeTime
     */
    public function isValid()
    {
        return time() < ($this->created_at + Yii::$app->client->refreshExpiry);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        throw new NotSupportedException('"getAuthKey" is not implemented.');
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        throw new NotSupportedException('"validateAuthKey" is not implemented.');
    }

    /**
     * Generates Refresh Token
     */
    public function generateRefreshToken()
    {
        $this->refresh_token = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates Access Token and stores it in app's cache
     */
    public static function generateAccessToken()
    {
        $access_token = Yii::$app->security->generateRandomString();

         $cached = Yii::$app->cache->add(
            $access_token,
            Yii::$app->user->id,
            Yii::$app->client->accessExpiry
        );

        return $cached ? $access_token : false;
    }

    /**
     * Revokes Access Token and stores it in app's cache
     */
    public static function revokeAccessToken($access_token)
    {
        return Yii::$app->cache->delete($access_token);
    }

}