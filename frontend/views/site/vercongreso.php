<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CongresoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Congresos');
?>
<div class="congreso-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
   
    <?php 
    $gridColumn = [
                ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'provincia_id',
                'label' => Yii::t('app', 'Provincia'),
                'value' => function($model){
                    return $model->provincia->Provincia;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Provincia::find()->asArray()->all(), 'id', 'Provincia'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Provincia', 'id' => 'grid-congreso-search-provincia_id']
            ],
        'Nombre',
        'Fecha_Inicio',
        'Fecha_Final',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{presentacion}',
            'buttons' => [
                'presentacion' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Ver Presentaciones']);
                },
            ],
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-congreso']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-list-alt"></span>  '. Html::encode($this->title), 
            'footer' => false
        ],
        // your toolbar can include the additional full export menu
        /*
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
        */
        
    ]); ?>

</div>
