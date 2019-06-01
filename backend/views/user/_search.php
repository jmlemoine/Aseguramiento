<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true, 'placeholder' => 'Apellido']) ?>

    <?= $form->field($model, 'afiliacion_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Afiliacion::find()->orderBy('id')->asArray()->all(), 'id', 'Afiliacion'),
        'options' => ['placeholder' => Yii::t('app', 'Elige Afiliacion')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tipo_user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\TipoUser::find()->orderBy('id')->asArray()->all(), 'id', 'Tipo'),
        'options' => ['placeholder' => Yii::t('app', 'Elige Tipo user')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php /* echo $form->field($model, 'pais_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pais::find()->orderBy('id')->asArray()->all(), 'id', 'Pais'),
        'options' => ['placeholder' => Yii::t('app', 'Elige Pais')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) */ ?>

    <?php /* echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) */ ?>

    <?php /* echo $form->field($model, 'Telefono')->textInput(['maxlength' => true, 'placeholder' => 'Telefono']) */ ?>

    <?php /* echo $form->field($model, 'Sexo')->dropDownList([ 'Masculino' => 'Masculino', 'Femenino' => 'Femenino', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'Fecha_Nacimiento')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Elige Fecha Nacimiento'),
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'Foto')->textInput(['placeholder' => 'Foto']) */ ?>

    <?php /* echo $form->field($model, 'filename')->textInput(['maxlength' => true, 'placeholder' => 'Filename']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reiniciar'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
