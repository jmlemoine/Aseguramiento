<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pais */

$this->title = Yii::t('app', 'Nuevo {modelClass}: ', [
    'modelClass' => 'Pais',
]). ' ' . $model->Pais;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Pais, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Nuevo');
?>
<div class="pais-create">

    

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
