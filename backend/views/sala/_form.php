<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sala */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Presentacion', 
        'relID' => 'presentacion', 
        'value' => \yii\helpers\Json::encode($model->presentacions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UserSala', 
        'relID' => 'user-sala', 
        'value' => \yii\helpers\Json::encode($model->userSalas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="sala-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'Nombre_Sala')->textInput(['maxlength' => true, 'placeholder' => 'Nombre Sala']) ?>

    <?php
    $forms = [
        /*
        [
            'label' => '<i class="glyphicon glyphicon-comment"></i> ' . Html::encode(Yii::t('app', 'Presentaciones')),
            'content' => $this->render('_formPresentacion', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presentacions),
            ]),
        ],
        */
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> ' . Html::encode(Yii::t('app', 'Moderadores')),
            'content' => $this->render('_formUserSala', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->userSalas),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Añadir') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton(Yii::t('app', 'Nuevo'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
