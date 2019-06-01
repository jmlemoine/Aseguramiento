<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PresentacionUser */

$this->title = $model->presentacion_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentacion y Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Presentacion Usuario').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'presentacion.Titulo',
                'label' => Yii::t('app', 'Presentacion')
            ],
        [
                'attribute' => 'user.username',
                'label' => Yii::t('app', 'Usuario')
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
