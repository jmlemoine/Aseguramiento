<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSala */

$this->title = '';  //$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-sala-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'User Sala')?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'user_id' => $model->user_id, 'sala_id' => $model->sala_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Nuevo'), ['save-as-new', 'user_id' => $model->user_id, 'sala_id' => $model->sala_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'user_id' => $model->user_id, 'sala_id' => $model->sala_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'user_id' => $model->user_id, 'sala_id' => $model->sala_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
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
    <div class="row">
        <h4>Sala<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSala = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre_Sala',
    ];
    echo DetailView::widget([
        'model' => $model->sala,
        'attributes' => $gridColumnSala    ]);
    ?>
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Apellido',
        'afiliacion.Afiliacion',
        'tipoUser.Tipo',
        'username',
        'email:email',
        'Telefono',
        //'Foto',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
</div>
