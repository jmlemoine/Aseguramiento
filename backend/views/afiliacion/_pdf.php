<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Afiliacion */

$this->title = $model->Afiliacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Afiliacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="afiliacion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Afiliacion').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Afiliacion',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerUser->totalCount){
    $gridColumnUser = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                [
                'attribute' => 'tipoUser.Tipo',
                'label' => Yii::t('app', 'Tipo Usuario')
            ],
        'username',
        'email:email',
        'Foto',
        'Nombre',
        'Apellido',
        'Telefono',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUser,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Usuario')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUser
    ]);
}
?>
    </div>
</div>
