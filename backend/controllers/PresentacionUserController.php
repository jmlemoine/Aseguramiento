<?php

namespace backend\controllers;

use Yii;  Yii::$app->getModule('debug')->instance->allowedIPs = [];
use backend\models\PresentacionUser;
use backend\models\PresentacionUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PresentacionUserController implements the CRUD actions for PresentacionUser model.
 */
class PresentacionUserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'save-as-new'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all PresentacionUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PresentacionUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PresentacionUser model.
     * @param integer $presentacion_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($presentacion_id, $user_id)
    {
        $model = $this->findModel($presentacion_id, $user_id);
        return $this->render('view', [
            'model' => $this->findModel($presentacion_id, $user_id),
        ]);
    }

    /**
     * Creates a new PresentacionUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PresentacionUser();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PresentacionUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $presentacion_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($presentacion_id, $user_id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new PresentacionUser();
        }else{
            $model = $this->findModel($presentacion_id, $user_id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PresentacionUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $presentacion_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($presentacion_id, $user_id)
    {
        $this->findModel($presentacion_id, $user_id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export PresentacionUser information into PDF format.
     * @param integer $presentacion_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionPdf($presentacion_id, $user_id) {
        $model = $this->findModel($presentacion_id, $user_id);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
    * Creates a new PresentacionUser model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($presentacion_id, $user_id) {
        $model = new PresentacionUser();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($presentacion_id, $user_id);
        }
    
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the PresentacionUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $presentacion_id
     * @param integer $user_id
     * @return PresentacionUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($presentacion_id, $user_id)
    {
        if (($model = PresentacionUser::findOne(['presentacion_id' => $presentacion_id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
