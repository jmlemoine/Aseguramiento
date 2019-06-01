<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Congreso */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Presentacion', 
        'relID' => 'presentacion', 
        'value' => \yii\helpers\Json::encode($model->presentacions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="congreso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

     <?= Form::widget([
                'model'=>$model,
                'form'=>$form,
                'columns'=>2,
                'attributes'=>[
                    'provincia_id'=>[
                        'type'=>Form::INPUT_WIDGET, 
                        'widgetClass'=>'\kartik\widgets\Select2', 
                        'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\Provincia::find()->orderBy('id')->asArray()->all(), 'id', 'Provincia'),
                            'options' => ['placeholder' => Yii::t('app', 'Elige Provincia')],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                        ],
                        //'hint'=>'Type and select state'
                    ],
                    'Nombre'=>['type'=>Form::INPUT_TEXT],
                    
                ]
            ]);
    ?>

    <?= Form::widget([
                    'model'=>$model,
                    'form'=>$form,
                    'columns'=>2,
                    'attributes'=>[
                        'Fecha_Inicio'=>[
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\DateTimePicker', 
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ],

                        'Fecha_Final'=>[
                            'type'=>Form::INPUT_WIDGET,  
                            'widgetClass'=>'\kartik\widgets\DateTimePicker', 
                            //'hint'=>'Type and select state',
                            'pluginOptions' => [
                                'autoclose' => true
                            ]
                        ],
                    ]
                ]);
            ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Presentacion')),
            'content' => $this->render('_formPresentacion', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presentacions),
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
