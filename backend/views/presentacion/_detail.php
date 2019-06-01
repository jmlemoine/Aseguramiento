<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */

?>
<div class="presentacion-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
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
        'Archivo',
        //'filename',
        'Descripcion:ntext',
        [
            'attribute' => 'estado.Estado',
            'label' => Yii::t('app', 'Estado'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>