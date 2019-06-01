<?php
namespace auth\models;

use Yii;
use auth\models\User as authUser;
use common\models\User as commonUser;

/**
 * Signup form for REST
 */
class SignupForm extends \common\models\SignupForm
{
    /**
     * @inheritdoc
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new commonUser;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            if ($user->save()) {
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
        }

        return null;
    }
}
