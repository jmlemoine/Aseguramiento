<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    /*
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Pais')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
    */
        [
        'label' => '<i class="glyphicon glyphicon-globe"></i> '. Html::encode(Yii::t('app', 'Provincias')),
        'content' => $this->render('_dataProvincia', [
            'model' => $model,
            'row' => $model->provincias,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-user"></i> '. Html::encode(Yii::t('app', 'Usuarios')),
        'content' => $this->render('_dataUser', [
            'model' => $model,
            'row' => $model->users,
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
