<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    /*
    [
        'label' => '<i class="glyphicon glyphicon-calendar"></i> '. Html::encode(Yii::t('app', 'Congreso')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
    */
            [
        'label' => '<i class="glyphicon glyphicon-comment"></i> '. Html::encode(Yii::t('app', 'Presentaciones')),
        'content' => $this->render('_dataPresentacion', [
            'model' => $model,
            'row' => $model->presentacions,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
