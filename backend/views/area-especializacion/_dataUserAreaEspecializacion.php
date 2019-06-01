<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->userAreaEspecializacions,
        'key' => function($model){
            return ['user_id' => $model->user_id, 'area_especializacion_id' => $model->area_especializacion_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'user.tipoUser.Tipo',
            'label' => Yii::t('app', 'Tipo')
        ],
        ['attribute' =>'user.username',
        'label' => Yii::t('app', 'Usuario')
        ],
        'user.Nombre',
        'user.Apellido',
        'user.email:email',
        //'Foto',
        'user.Telefono',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'user-area-especializacion'
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
