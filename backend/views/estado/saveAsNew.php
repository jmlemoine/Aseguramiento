<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Estado */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Estado',
]). ' ' . $model->Estado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Estado, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="estado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
