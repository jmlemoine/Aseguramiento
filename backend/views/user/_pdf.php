<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Usuario').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
        [
                'attribute' => 'pais.Pais',
                'label' => Yii::t('app', 'Pais')
            ],
        'username',
        'email:email',
        'Telefono',
        'Sexo',
        'Fecha_Nacimiento',
        //'Foto',
        //'filename',
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
                'attribute' => 'presentacion.Titulo',
                'label' => Yii::t('app', 'Presentacion')
            ],
            ];
    echo Gridview::widget([
        'dataProvider' => $providerPresentacionUser,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Presentaciones')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPresentacionUser
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUserAreaEspecializacion->totalCount){
    $gridColumnUserAreaEspecializacion = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'areaEspecializacion.area',
                'label' => Yii::t('app', 'Area de especializacion')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUserAreaEspecializacion,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Areas')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUserAreaEspecializacion
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUserGradoAcademico->totalCount){
    $gridColumnUserGradoAcademico = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'gradoAcademico.Grado',
                'label' => Yii::t('app', 'Grado Academico')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUserGradoAcademico,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Grados')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUserGradoAcademico
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
                'attribute' => 'sala.Nombre_Sala',
                'label' => Yii::t('app', 'Sala')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUserSala,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Salas')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnUserSala
    ]);
}
?>
    </div>
</div>
