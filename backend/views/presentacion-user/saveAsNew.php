<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PresentacionUser */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'Presentacion User',
]). ' ' . $model->presentacion_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentacion y Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->presentacion_id, 'url' => ['view', 'presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="presentacion-user-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
