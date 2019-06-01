<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\DateTimePicker;
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;
// or 'use kartikile\FileInput' if you have only installed yii2-widget-fileinput in isolation
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PresentacionUser', 
        'relID' => 'presentacion-user', 
        'value' => \yii\helpers\Json::encode($model->presentacionUsers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="presentacion-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
        //'options'=>['enctype'=>'multipart/form-data']
        ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= Form::widget([
                    'model'=>$model,
                    'form'=>$form,
                    'columns'=>2,
                    'attributes'=>[
                        'congreso_id'=>[
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\Select2', 
                            'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\Congreso::find()->orderBy('id')->asArray()->all(), 'id', 'Nombre'),
                                'options' => ['placeholder' => Yii::t('app', 'Elige Congreso')],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                            ],
                            //'hint'=>'Type and select state'
                        ],

                        'sala_id'=>[
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\Select2', 
                            'options'=>[
                                'data'=>\yii\helpers\ArrayHelper::map(\backend\models\Sala::find()->orderBy('id')->asArray()->all(),'id', 'Nombre_Sala'),
                                'options' => ['placeholder' => Yii::t('app', 'Elige Sala')],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                            ],
                            //'hint'=>'Type and select state'
                        ],
                    ]
                ]);
            ?>

        <?= Form::widget([
                        'model'=>$model,
                        'form'=>$form,
                        'columns'=>4,
                        'attributes'=>[
                            'Titulo'=>['type'=>Form::INPUT_TEXT],
                            'Institucion'=>['type'=>Form::INPUT_TEXT],
                            'Area_Tematica'=>['type'=>Form::INPUT_TEXT],
                            'Modalidad_Presentacion'=>['type'=>Form::INPUT_TEXT],
                            
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
                            'options'=>[
                                'pluginOptions' => [
                                    'autoclose' => true
                                ],
                            ], 
                        ],

                        'Fecha_Final'=>[
                            'type'=>Form::INPUT_WIDGET,  
                            'widgetClass'=>'\kartik\widgets\DateTimePicker', 
                            'options'=>[
                                'pluginOptions' => [
                                    'autoclose' => true
                                ],
                            ], 
                        ],
                    ]
                ]);
            ?>


    <?= $form->field($model, 'Vinculo')->textInput(['maxlength' => true, 'placeholder' => 'Link']) ?>
    
    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
       'options'=>[
           //'accept'=>'image/*',
           //'multiple'=>true
        ],
       'pluginOptions'=>[
            'showUpload' => false,
            'showCancel' => false,
            //'allowedFileExtensions'=>['jpg','gif','png']
           ]
        ]);?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>
    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> ' . Html::encode(Yii::t('app', 'Presentadores')),
            'content' => $this->render('_formPresentacionUser', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presentacionUsers),
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
