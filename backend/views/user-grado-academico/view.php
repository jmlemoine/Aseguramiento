<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserGradoAcademico */

$this->title = '';  //$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Usuario y su Grado academico'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-grado-academico-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Usuario y su Grado academico')?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Nuevo'), ['save-as-new', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'user_id' => $model->user_id, 'grado_academico_id' => $model->grado_academico_id], [
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
            'attribute' => 'gradoAcademico.Grado',
            'label' => Yii::t('app', 'Grado Academico'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        
    </div>
    <?php 
    /*
    $gridColumnGradoAcademico = [
        ['attribute' => 'id', 'visible' => false],
        'Grado',
    ];
    echo DetailView::widget([
        'model' => $model->gradoAcademico,
        'attributes' => $gridColumnGradoAcademico    ]);
        */
    ?>
    <div class="row">
        <h4>Usuario<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Apellido',
        'afiliacion.Afiliacion',
        'tipoUser.Tipo',
        'username',
        'email',
        'Telefono',
        //'Foto',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
</div>
