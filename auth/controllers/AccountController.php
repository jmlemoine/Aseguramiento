<?php
namespace auth\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use auth\models\LoginForm;
use auth\models\SignupForm;

/**
 * Public Account Controller class.
 */
class AccountController extends Controller
{
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');

        if ($auth = $model->login()) {
            return [
                'user' => [
                    'name' => Yii::$app->user->identity->username,
                    'email' => Yii::$app->user->identity->email,
                ],
                'grant' => [
                    'refresh_token' => $auth['refresh_token'],
                    'access_token' => $auth['access_token'],
                    'expires_at' => time() + Yii::$app->client->accessExpiry,
                ]
            ];
        } 

        if ($model->hasErrors() === false) {
            throw new ServerErrorHttpException('Failed for unknown reason.');
        }

        return $model;
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        $model->load(Yii::$app->request->bodyParams, '');

        if ($auth = $model->signup()) {
            return [
                'user' => [
                    'name' => Yii::$app->user->identity->username,
                    'email' => Yii::$app->user->identity->email,
                ],
                'grant' => [
                    'refresh_token' => $auth['refresh_token'],
                    'access_token' => $auth['access_token'],
                    'expires_at' => time() + Yii::$app->client->accessExpiry,
                ]
            ];
        } 

        if ($model->hasErrors() === false) {
            throw new ServerErrorHttpException('Failed for unknown reason.');
        }

        return $model;
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->bodyParams, '') && $model->validate()) {
            if ($model->sendEmail() === false) {
                throw new ServerErrorHttpException('Sorry, we are unable to reset password for provided email.');
            }
            return ['message' => 'Check your email for further instructions.'];
        }
        
        return $model;
    }

    public function actionResetPassword()
    {
        $token = ArrayHelper::getValue(Yii::$app->request->bodyParams, 'token');

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->validate() && $model->resetPassword()) {
            return ['success' => 'New password was saved.'];
        } 
        
        return $model;
    }

}