<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TipoUser */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'Tipo User',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="tipo-user-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
