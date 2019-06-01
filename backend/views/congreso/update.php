<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Congreso */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Congreso',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Congresos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="congreso-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
