<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sala */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Sala',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="sala-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
