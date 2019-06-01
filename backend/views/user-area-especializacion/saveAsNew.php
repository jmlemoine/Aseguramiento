<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserAreaEspecializacion */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'User Area Especializacion',
]). ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Area Especializacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id, 'area_especializacion_id' => $model->area_especializacion_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="user-area-especializacion-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
