<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    /*
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'GradoAcademico')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
    */
        [
        'label' => '<i class="glyphicon glyphicon-user"></i> '. Html::encode(Yii::t('app', 'Usuarios')),
        'content' => $this->render('_dataUserGradoAcademico', [
            'model' => $model,
            'row' => $model->userGradoAcademicos,
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
