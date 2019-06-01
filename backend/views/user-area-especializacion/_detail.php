<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAreaEspecializacion */

?>
<div class="user-area-especializacion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->user_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'Usuario'),
        ],
        [
            'attribute' => 'areaEspecializacion.area',
            'label' => Yii::t('app', 'Area Especializacion'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>