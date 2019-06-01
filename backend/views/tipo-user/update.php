<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoUser */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Tipo User',
]) . ' ' . $model->Tipo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Tipo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tipo-user-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
