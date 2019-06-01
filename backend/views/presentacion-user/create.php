<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PresentacionUser */

$this->title = Yii::t('app', 'Añadir Presentacion Usuario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentacion y Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-user-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
