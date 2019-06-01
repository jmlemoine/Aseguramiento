<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Provincia */

$this->title = $model->Provincia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provincias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provincia-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Provincia').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'pais.Pais',
                'label' => Yii::t('app', 'Pais')
            ],
        'Provincia',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerCongreso->totalCount){
    $gridColumnCongreso = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                'Nombre',
        'Fecha_Inicio',
        'Fecha_Final',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCongreso,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Congreso')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnCongreso
    ]);
}
?>
    </div>
</div>
