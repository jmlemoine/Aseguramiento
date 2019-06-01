<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSala */

?>
<div class="user-sala-view">

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
            'attribute' => 'sala.Nombre_Sala',
            'label' => Yii::t('app', 'Sala'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>