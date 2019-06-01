<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use common\models\SignupForm;
use frontend\models\ContactForm;
//use frontend\models\Presentacion;
use backend\models\Presentacion;
use backend\models\PresentacionUser;
use backend\models\Congreso;
use backend\models\CongresoSearch;
use yii\data\ActiveDataProvider;

/**
 * Site controller
 */
class SiteController extends Controller{

    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionServicio()
    {
        return $this->render('servicio');
    }

    public function actionContacto()
    {
        return $this->render('contacto');
    }

    public function actionClient()
    {
        return $this->render('client');
    }

    public function actionTeam()
    {
        return $this->render('team');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCongresopasado()
    {
        return $this->render('congresopasado');
    }

    public function actionEvento()
    {
        return $this->render('evento');
    }

    public function actionEstadistica()
    {
        return $this->render('estadistica');
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout(){
        
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model =  new \backend\admin\models\form\Signup(); //new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                //var_dump($user);
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
        /**
     * Conferencia
     *
     * @return mixed
     */
    public function actionPresentacion($id)
    {
       
        $dataProvider = new ActiveDataProvider([
            'query' => Presentacion::find()->where('congreso_id='.$id),
        ]);

        return $this->render('presentacion', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionVernotificacion()
    {
       // echo "here";
        //die();
        //$presentacion_user = PresentacionUser::findAll(['user_id'=>Yii::$app->user->identity->id,'estado_notificacion'=>1]);
        $presentacion_user = PresentacionUser::find()->where('user_id='.Yii::$app->user->identity->id.' and estado_notificacion=1');

        $dataProvider = new ActiveDataProvider([
            'query' => $presentacion_user,
        ]);

        return $this->render('notificacion', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionComentar()
    {

        $presentacion_user = PresentacionUser::find()->where('user_id='.Yii::$app->user->identity->id);

        $dataProvider = new ActiveDataProvider([
            'query' => $presentacion_user,
        ]);

        return $this->render('comentario', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPresentacionajax()
    {
       
        $dataProvider = new ActiveDataProvider([
            'query' => Presentacion::find(),
        ]);

        return $this->renderPartial('presentacion', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGuardarretro($id, $coment)
    {
       //$model= PresentacionUser::findbyPK($id);
       $model= PresentacionUser::findOne($id);
       //find()->andWhere(['presentacion_id' => $id])->active()->one();
       $model->comentario = $coment;
       $model->save();
       $this->redirect('comentar');

    }
    public function actionUn_cribirse($presentacion_id)
    {
      //  echo "here";die();
       
      $user_id= Yii::$app->user->identity->id;
        /*echo 'DELETE FROM presentacion_user WHERE userid='.$user_id.' and presentacion_id='.$presentacion_id;
        $connection->createCommand('DELETE FROM presentacion_user WHERE userid='.$user_id.' and presentacion_id='.$presentacion_id)
        ->execute();
        */
        $presentacion_user=PresentacionUser::find()->where("user_id=$user_id and presentacion_id=$presentacion_id")->one();
        $presentacion_user->delete();
        $dataProvider = new ActiveDataProvider([
            'query' => Presentacion::find(),
        ]);

        return $this->renderPartial('presentacion', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCalendar(){
        $userid = Yii::$app->user->identity->id;
       $model =PresentacionUser::find()->where("user_id=".$userid);
       return $this->render('calendar');
    }
    public function actionAsignar_presentacion($presentacion_id)
    {
        $model = new PresentacionUser();
        $model->user_id = Yii::$app->user->identity->id;
        $model->presentacion_id = $presentacion_id;
        $model->save();
		 $dataProvider = new ActiveDataProvider([
            'query' => Presentacion::find(),
        ]);

        return $this->renderPartial('presentacion', [
            'dataProvider' => $dataProvider,
        ]);
        //echo '1';

    }

    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Presentacion();
        }else{
            $model = $this->findModel($id);
            
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
             $presentacion_user = PresentacionUser::findAll(['presentacion_id'=>$model->id]);
             foreach($presentacion_user as $pres){
                $pres->estado_notificacion=1;


             }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        $model = Presentacion::findOne($id);
        //$model = $this->findModel($id);
       $userid= Yii::$app->user->identity->id;
       $presuser=PresentacionUser::find()->where('user_id='.$userid.' and presentacion_id='.$id)->one();
       $presuser->estado_notificacion=0;
       $presuser->save();

        $providerPresentacionUser = new \yii\data\ArrayDataProvider([
            'allModels' => $model->presentacionUsers,
        ]);
        return $this->render('view', [
            'model' => Presentacion::findOne($id),
            'providerPresentacionUser' => $providerPresentacionUser,
        ]);
    }
    public function actionCongresos()
    {
        $searchModel = new CongresoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('vercongreso', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
}
