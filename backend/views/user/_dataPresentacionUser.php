<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->presentacionUsers,
        'key' => function($model){
            return ['presentacion_id' => $model->presentacion_id, 'user_id' => $model->user_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'presentacion.Titulo',
                'label' => Yii::t('app', 'Presentacion')
            ],
            
            [
                'attribute' => 'presentacion.Fecha_Inicio',
                'label' => Yii::t('app', 'Fecha Inicio')
            ],

            [
                'attribute' => 'presentacion.Fecha_Final',
                'label' => Yii::t('app', 'Fecha Fin')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'presentacion-user'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
