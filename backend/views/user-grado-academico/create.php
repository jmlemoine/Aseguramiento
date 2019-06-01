<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserGradoAcademico */

$this->title = Yii::t('app', 'Añadir User Grado Academico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Grado academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-grado-academico-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
