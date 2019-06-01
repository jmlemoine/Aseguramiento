<?php

namespace backend\controllers;

use Yii;  Yii::$app->getModule('debug')->instance->allowedIPs = [];
use backend\models\UserGradoAcademico;
use backend\models\UserGradoAcademicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserGradoAcademicoController implements the CRUD actions for UserGradoAcademico model.
 */
class UserGradoAcademicoController extends Controller
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
     * Lists all UserGradoAcademico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserGradoAcademicoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserGradoAcademico model.
     * @param integer $user_id
     * @param integer $grado_academico_id
     * @return mixed
     */
    public function actionView($user_id, $grado_academico_id)
    {
        $model = $this->findModel($user_id, $grado_academico_id);
        return $this->render('view', [
            'model' => $this->findModel($user_id, $grado_academico_id),
        ]);
    }

    /**
     * Creates a new UserGradoAcademico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserGradoAcademico();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserGradoAcademico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $grado_academico_id
     * @return mixed
     */
    public function actionUpdate($user_id, $grado_academico_id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new UserGradoAcademico();
        }else{
            $model = $this->findModel($user_id, $grado_academico_id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserGradoAcademico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $grado_academico_id
     * @return mixed
     */
    public function actionDelete($user_id, $grado_academico_id)
    {
        $this->findModel($user_id, $grado_academico_id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export UserGradoAcademico information into PDF format.
     * @param integer $user_id
     * @param integer $grado_academico_id
     * @return mixed
     */
    public function actionPdf($user_id, $grado_academico_id) {
        $model = $this->findModel($user_id, $grado_academico_id);

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
    * Creates a new UserGradoAcademico model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($user_id, $grado_academico_id) {
        $model = new UserGradoAcademico();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($user_id, $grado_academico_id);
        }
    
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the UserGradoAcademico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $grado_academico_id
     * @return UserGradoAcademico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $grado_academico_id)
    {
        if (($model = UserGradoAcademico::findOne(['user_id' => $user_id, 'grado_academico_id' => $grado_academico_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
