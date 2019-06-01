<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    /*
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Presentacion')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
    */
                [
        'label' => '<i class="glyphicon glyphicon-user"></i> '. Html::encode(Yii::t('app', 'Presentadores')),
        'content' => $this->render('_dataPresentacionUser', [
            'model' => $model,
            'row' => $model->presentacionUsers,
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
