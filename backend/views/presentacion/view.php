<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */

$this->title = '';  //$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Presentacion')?></h2>
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
        [
            'attribute' => 'congreso.Nombre',
            'label' => Yii::t('app', 'Congreso'),
        ],
        [
            'attribute' => 'sala.Nombre_Sala',
            'label' => Yii::t('app', 'Sala'),
        ],
        'Titulo',
        'Institucion',
        'Area_Tematica',
        'Modalidad_Presentacion',
        'Fecha_Inicio',
        'Fecha_Final',
        'Vinculo',
        //'Archivo',
        'filename', 
        [
            'attribute'=>'Archivo',
            'value' =>  Html::a(Html::img(Yii::getAlias('@web').'/uploads/'.$model->Archivo, ['alt'=>'some', 'class'=>'thing', 'height'=>'100px', 'width'=>'100px']), ['site/zoom']),
            'format' => ['raw'],
        ],
        'Descripcion:ntext', 
        [ 
            'attribute' => 'estado.id', 
            'label' => Yii::t('app', 'Estado'), 
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
        <div class="row"> 
        <h4>Estado<?= ' '. Html::encode($this->title) ?></h4> 
    </div> 
    <?php  
    $gridColumnEstado = [ 
        ['attribute' => 'id', 'visible' => false], 
        'Estado', 
    ]; 
    echo DetailView::widget([ 
        'model' => $model->estado, 
        'attributes' => $gridColumnEstado   ]); 
    ?> 
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
        <h4>Congreso<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCongreso = [
        ['attribute' => 'id', 'visible' => false],
        'provincia.Provincia',
        'Nombre',
        'Fecha_Inicio',
        'Fecha_Final',
    ];
    echo DetailView::widget([
        'model' => $model->congreso,
        'attributes' => $gridColumnCongreso    ]);
    ?>
    
    <div class="row">
<?php
if($providerPresentacionUser->totalCount){
    $gridColumnPresentacionUser = [
        ['class' => 'yii\grid\SerialColumn'],

        ['attribute' => 'user.Nombre',
        'label' => Yii::t('app', 'Nombre')
            ],
        
        ['attribute' => 'user.Apellido',
         'label' => Yii::t('app', 'Apellido')
            ],
        
        ['attribute' =>'user.username',
        'label' => Yii::t('app', 'Usuario')
            ],

        ['attribute' => 'user.email',
        'label' => Yii::t('app', 'Email')
            ],

        ['attribute' => 'user.Telefono',
        'label' => Yii::t('app', 'Telefono')
        ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentacionUser,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-presentacion-user']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-user"></span> ' . Html::encode(Yii::t('app', 'Presentadores')),
            'footer' => false
        ],
        'columns' => $gridColumnPresentacionUser
    ]);
}
?>

    </div>
</div>
