<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Provincia */

$this->title = Yii::t('app', 'Añadir Provincia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provincias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provincia-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
