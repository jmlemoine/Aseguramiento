<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Sala */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'Sala',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="sala-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
