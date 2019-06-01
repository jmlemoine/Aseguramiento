<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PresentacionUser */

?>
<div class="presentacion-user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->presentacion_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'presentacion.Titulo',
            'label' => Yii::t('app', 'Presentacion'),
        ],
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'Usuario'),
        ],
        'estado_notificacion',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>