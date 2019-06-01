<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserSala */

$this->title = Yii::t('app', 'Añadir User Sala');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-sala-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
