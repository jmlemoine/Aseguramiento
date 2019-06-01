<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'Presentacion',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="presentacion-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
