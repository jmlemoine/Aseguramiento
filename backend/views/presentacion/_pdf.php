<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Presentacion').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'congreso.Nombre',
                'label' => Yii::t('app', 'Congreso')
            ],
        [
                'attribute' => 'sala.Nombre_Sala',
                'label' => Yii::t('app', 'Sala')
            ],
        'Titulo',
        'Institucion',
        'Area_Tematica',
        'Modalidad_Presentacion',
        'Fecha_Inicio',
        'Fecha_Final',
        'Vinculo',
        'Archivo',
        //'filename',
        'Descripcion:ntext',
        [
                'attribute' => 'estado.Estado',
                'label' => Yii::t('app', 'Estado')
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerPresentacionUser->totalCount){
    $gridColumnPresentacionUser = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'user.Nombre',
                'label' => Yii::t('app', 'User')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentacionUser,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Presentacion User')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPresentacionUser
    ]);
}
?>
    </div>
</div>
