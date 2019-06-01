<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PresentacionUser */

$this->title = '';  //$this->title = $model->presentacion->Titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentacion y Usuario'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-user-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Presentacion y Usuario')?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Nuevo'), ['save-as-new', 'presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id], [
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
            'attribute' => 'presentacion.Titulo',
            'label' => Yii::t('app', 'Presentacion'),
        ],
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'Usuario'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Presentacion<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnPresentacion = [
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
        'Archivo',
    ];
    echo DetailView::widget([
        'model' => $model->presentacion,
        'attributes' => $gridColumnPresentacion    ]);
    ?>
    <div class="row">
        <h4>Usuario</h4>
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
        'Foto',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
</div>
