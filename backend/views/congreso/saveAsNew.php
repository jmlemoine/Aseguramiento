<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Congreso */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'Congreso',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Congresos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="congreso-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
