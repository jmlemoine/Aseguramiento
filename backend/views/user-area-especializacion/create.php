<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserAreaEspecializacion */

$this->title = Yii::t('app', 'Añadir User Area Especializacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Area Especializacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-area-especializacion-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
