<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TipoUser */

$this->title = Yii::t('app', 'Añadir Tipo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-user-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
