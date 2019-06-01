<?php
namespace auth\models;

use Yii;
use auth\models\User as authUser;

/**
 * Login form for REST
 */
class LoginForm extends \common\models\LoginForm
{
	/**
     * @inheritdoc
     */
	public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();

            $auth = new authUser;
            $auth->user_id = $user->id;
            $auth->client_id = Yii::$app->client->id;
            $auth->long_term = (Yii::$app->client->remember === 'true');
            $auth->generateRefreshToken();

            if ($auth->save() && Yii::$app->getUser()->login($user) && $access_token = $auth->generateAccessToken()) {
                return [
                    'access_token' => $access_token,
                    'refresh_token' => $auth->refresh_token, 
                ];
            }
        }
        
        return null;
    }

}
