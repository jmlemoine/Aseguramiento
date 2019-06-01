<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoUser */

$this->title = '';  //$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-user-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Tipo').' '. Html::encode($this->title) ?></h2>
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
/*
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Tipo',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    */
?>
    </div>
    
    <div class="row">
<?php
if($providerUser->totalCount){
    $gridColumnUser = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'Nombre',
            'Apellido',
            [
                'attribute' => 'afiliacion.Afiliacion',
                'label' => Yii::t('app', 'Afiliacion')
            ],
                        'username',
            'email:email',
            'Telefono',
            'Foto',
            /*
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{save-as-new} {view} {update} {delete}',
                'buttons' => [
                    'save-as-new' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Nuevo']);
                    },
                ],
            ],
            */
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUser,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-user"></span> ' . Html::encode(Yii::t('app', $model->Tipo)),
            'footer' => false
        ],
        'columns' => $gridColumnUser
    ]);
}
?>

    </div>
</div>
