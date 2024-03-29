<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sala */

$this->title = '';  //$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sala-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Sala')?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Nuevo'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id], [
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
        ['attribute' => 'id', 'visible' => false],
        'Nombre_Sala',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentacion->totalCount){
    $gridColumnPresentacion = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'congreso.Nombre',
                'label' => Yii::t('app', 'Congreso')
            ],
                        'Titulo',
            'Institucion',
            'Area_Tematica',
            'Modalidad_Presentacion',
            'Fecha_Inicio',
            'Fecha_Final',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentacion,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentacion']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-comment"></span> ' . Html::encode(Yii::t('app', 'Presentaciones')),
        ],
        'columns' => $gridColumnPresentacion
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUserSala->totalCount){
    $gridColumnUserSala = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'user.Nombre',
                'label' => Yii::t('app', 'Usuario')
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerUserSala,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user-sala']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-user"></span> ' . Html::encode(Yii::t('app', 'Moderadores')),
        ],
        'columns' => $gridColumnUserSala
    ]);
}
?>
    </div>
</div>