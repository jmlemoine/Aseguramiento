<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AreaEspecializacion */

$this->title = Yii::t('app', 'Añadir Area');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Areas de especializaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-especializacion-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
