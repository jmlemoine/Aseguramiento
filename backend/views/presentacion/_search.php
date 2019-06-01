<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\models\PresentacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-presentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_VERTICAL
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= Form::widget([
                    'model'=>$model,
                    'form'=>$form,
                    'columns'=>3,
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

                        'estado_id'=>[
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\Select2', 
                            'options'=>[
                                'data'=>\yii\helpers\ArrayHelper::map(\backend\models\Estado::find()->orderBy('id')->asArray()->all(),'id', 'Estado'),
                                'options' => ['placeholder' => Yii::t('app', 'Elige Estado')],
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

    <?php /* echo $form->field($model, 'Area_Tematica')->textInput(['maxlength' => true, 'placeholder' => 'Area Tematica']) */ ?>

    <?php /* echo $form->field($model, 'Modalidad_Presentacion')->textInput(['maxlength' => true, 'placeholder' => 'Modalidad Presentacion']) */ ?>

    <?php /* echo $form->field($model, 'Fecha_Inicio')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Elige Fecha Inicio'),
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'Fecha_Final')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Elige Fecha Final'),
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'Vinculo')->textInput(['maxlength' => true, 'placeholder' => 'Vinculo']) */ ?>

    <?php /* echo $form->field($model, 'Archivo')->textInput(['placeholder' => 'Archivo']) */ ?>

    <?php /* echo $form->field($model, 'filename')->textInput(['maxlength' => true, 'placeholder' => 'Filename']) */ ?> 
 
    <?php /* echo $form->field($model, 'Descripcion')->textarea(['rows' => 6]) */ ?> 

    <?php /* echo $form->field($model, 'estado_id')->widget(\kartik\widgets\Select2::classname(), [ 
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Estado::find()->orderBy('id')->asArray()->all(), 'id', 'Estado'), 
        'options' => ['placeholder' => Yii::t('app', 'Choose Estado')], 
        'pluginOptions' => [ 
            'allowClear' => true 
        ], 
    ]); */ ?> 

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reiniciar'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
