<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Presentacion',
]) . ' ' . $model->Titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="presentacion-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
