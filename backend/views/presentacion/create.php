<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */

$this->title = Yii::t('app', 'Añadir Presentacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
