<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\GradoAcademico */

$this->title = Yii::t('app', 'Añadir Grado');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grados academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grado-academico-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
