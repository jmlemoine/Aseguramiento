<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    /*
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Provincia')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
    */
        [
        'label' => '<i class="glyphicon glyphicon-list-alt"></i> '. Html::encode(Yii::t('app', 'Congresos')),
        'content' => $this->render('_dataCongreso', [
            'model' => $model,
            'row' => $model->congresos,
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
