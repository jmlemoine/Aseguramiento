<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Provincia */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'Provincia',
]). ' ' . $model->Provincia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provincias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Provincia, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="provincia-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
