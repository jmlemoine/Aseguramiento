<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
//use yii\widgets\ActiveForm;
use kartik\builder\Form;
/* @var $this yii\web\View */
/* @var $model backend\models\ProvinciaSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="form-provincia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'type' => ActiveForm::TYPE_VERTICAL
    ]); ?>

                <?= Form::widget([
                        'model'=>$model,
                        'form'=>$form,
                        'columns'=>2,
                        'attributes'=>[
                            'Provincia'=>['type'=>Form::INPUT_TEXT],
                            'pais_id'=>[
                                'type'=>Form::INPUT_WIDGET, 
                                'widgetClass'=>'\kartik\widgets\Select2', 
                                'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\Pais::find()->orderBy('id')->asArray()->all(), 'id', 'Pais'),], 
                                //'hint'=>'Type and select state'
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
