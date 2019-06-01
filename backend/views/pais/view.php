<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pais */

$this->title = '';  //$this->title = $model->Pais;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pais'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-view">

    <div class="row">
        <div class="col-sm-8">
        <h2><?= Yii::t('app', 'Pais')?></h2>
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
        'Pais',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerProvincia->totalCount){
    $gridColumnProvincia = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'Provincia',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProvincia,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-provincia']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-flobe"></span> ' . Html::encode(Yii::t('app', 'Provincia')),
            'footer' => false,
        ],
        'columns' => $gridColumnProvincia
    ]);
}
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
            [
                'attribute' => 'tipoUser.Tipo',
                'label' => Yii::t('app', 'Tipo')
            ],
                        'username',
            'email:email',
            'Telefono',
            //'Sexo',
            //'Fecha_Nacimiento',
            //'Foto',
            //'filename',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUser,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-user"></span> ' . Html::encode(Yii::t('app', 'Usuario')),
            'footer' => false,
        ],
        'columns' => $gridColumnUser
    ]);
}
?>

    </div>
</div>
