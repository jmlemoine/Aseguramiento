<?php
namespace auth\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use auth\models\ClientForm;

/**
 * Auth Base Controller class.
 */
class Controller extends \yii\rest\Controller
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // remove authentication filter
        unset($behaviors['authenticator']);
        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Allow-Origin' => ['*'],
                'Access-Control-Request-Method' => $this->verbs(),
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age' => 86400
            ],
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
	{
		if ($action->id !== 'options' && $action->id !== 'ping') {
			$params = Yii::$app->request->bodyParams;
			if (Yii::$app->client->loadClient($params) === false) {
	        	throw new BadRequestHttpException('Unknown requester');
			}
		}
	    return parent::beforeAction($action);
	}

    /**
     * Ping action should respond to /ping uri for test proposes and to confirm REST availability.
     */
    public function actionPing()
    {
        return 'pong';
    }

    /**
     * Responds to the OPTIONS request.
     * @param string $id
     */
    public function actionOptions()
    {
        if (Yii::$app->getRequest()->getMethod() !== 'OPTIONS') {
            Yii::$app->getResponse()->setStatusCode(405);
        }

        Yii::$app->getResponse()->getHeaders()->set('Allow', implode(', ', $this->verbs()));
    }

    /**
     * @inheritdoc
     */
    protected function verbs()
    {
        return ['GET', 'HEAD', 'POST', 'OPTIONS'];
    }

}
