<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserGradoAcademico */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'User Grado Academico',
]). ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Grado academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="user-grado-academico-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
