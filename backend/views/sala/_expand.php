<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    /*
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Sala')),
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
            [
        'label' => '<i class="glyphicon glyphicon-user"></i> '. Html::encode(Yii::t('app', 'Moderadores')),
        'content' => $this->render('_dataUserSala', [
            'model' => $model,
            'row' => $model->userSalas,
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
