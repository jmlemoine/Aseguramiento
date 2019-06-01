<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\GradoAcademico */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Grado Academico',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grados academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="grado-academico-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
