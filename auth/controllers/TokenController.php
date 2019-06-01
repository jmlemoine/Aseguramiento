<?php
namespace auth\controllers;

use Yii;

use auth\models\User;
use yii\helpers\ArrayHelper;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ServerErrorHttpException;

/**
 * Tokens Controller class.
 */
class TokenController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // add authentication filter to all Token actions except CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['options'],
        ];
        return $behaviors;
    }

    public function actionRefresh()
    {
        $access_token = User::generateAccessToken();
        if ($access_token === false) {
            throw new ServerErrorHttpException('Failed for unknown reason.');
        }

        return [
            'token' => [
                'access_token' => $access_token,
                'expires_at' => time() + Yii::$app->client->accessExpiry,
            ]
        ];
    }

    public function actionRevoke()
    {
        $access_token = ArrayHelper::getValue(Yii::$app->request->bodyParams, 'access_token');
        if ($access_token) User::revokeAccessToken($access_token);

        $refresh_token = substr(Yii::$app->request->headers->get('Authorization'), 7);
        $auth = User::findOne(['refresh_token' => $refresh_token]);
        if ($auth && $auth->delete() === false) {
            throw new ServerErrorHttpException('Failed for unknown reason.');
        }

        Yii::$app->getResponse()->setStatusCode(204);
    }

}