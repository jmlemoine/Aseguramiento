<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
//use yii\widgets\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\models\CongresoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-congreso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_VERTICAL
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= Form::widget([
        'model'=>$model,
        'form'=>$form,
        'columns'=>2,
        'attributes'=>[
            'Nombre'=>['type'=>Form::INPUT_TEXT],
            'provincia_id'=>[
                'type'=>Form::INPUT_WIDGET, 
                'widgetClass'=>'\kartik\widgets\Select2', 
                'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\Provincia::find()->orderBy('id')->asArray()->all(), 'id', 'Provincia'),], 
            ],
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reiniciar'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
