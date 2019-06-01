<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;
use kartik\builder\Form;
use kartik\select2\Select2;
use backend\models\AreaEspecializacion;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\admin\models\form\Signup */

$this->title = Yii::t('rbac-admin', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <p>Llene los siguientes campos para registro:</p>
    <?= Html::errorSummary($model)?>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup'], ['type'=>ActiveForm::TYPE_VERTICAL]) /*, ['options' => ['enctype' => 'multipart/form-data']]);*/ ?>
            
                <?= Form::widget([
                        'model'=>$model,
                        'form'=>$form,
                        'columns'=>2,
                        'attributes'=>[
                            'Nombre'=>['type'=>Form::INPUT_TEXT],
                            'Apellido'=>['type'=>Form::INPUT_TEXT],
                        ]
                    ]);
                ?>

                 <?= Form::widget([
                        'model'=>$model,
                        'form'=>$form,
                        'columns'=>2,
                        'attributes'=>[
                            'username'=>[
                                'label'=> 'Usuario', 
                                'type'=>Form::INPUT_TEXT
                            ],
                            'password'=>[
                                'label'=> 'Contraseña', 
                                'type'=>Form::INPUT_PASSWORD
                            ],
                        ]
                    ]);
                ?>

                 <?= Form::widget([
                    'model'=>$model,
                    'form'=>$form,
                    'columns'=>2,
                    'attributes'=>[
                        'tipo_user_id'=>[
                            'label'=> 'Tipo', 
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\Select2', 
                            'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\TipoUser::find()->orderBy('id')->asArray()->all(), 'id', 'Tipo'),
                                'options' => ['placeholder' => Yii::t('app', 'Elige Tipo')],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                            ],
                        ],

                        'afiliacion_id'=>[
                            'label'=> 'Afiliacion', 
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\Select2', 
                            'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\Afiliacion::find()->orderBy('id')->asArray()->all(), 'id', 'Afiliacion'),
                                'options' => ['placeholder' => Yii::t('app', 'Elige Afiliacion')],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                            ],
                        ],
                        
                    ]
                ]);
            ?>


             <?php /*$form->field($userAreaEspecializacion, 'area_especializacion_id')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(AreaEspecializacion::find()->all(), 'id', 'area'),
                    'size' => Select2::MEDIUM,
                    'options' => ['placeholder' => 'Elige area', 'multiple' => true],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);*/ ?>

             <?= Form::widget([
                'model'=>$model,
                'form'=>$form,
                'columns'=>2,
                'attributes'=>[
                    'email'=>['type'=>Form::INPUT_TEXT],
                    'Telefono'=>['type'=>Form::INPUT_TEXT],
                ]
            ]);
            ?>

            <?= Form::widget([
                    'model'=>$model,
                    'form'=>$form,
                    'columns'=>2,
                    'attributes'=>[

                        'pais_id'=>[
                            'label'=> 'Pais', 
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\Select2', 
                            'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\Pais::find()->orderBy('id')->asArray()->all(), 'id', 'Pais'),
                                'options' => ['placeholder' => Yii::t('app', 'Elige Pais')],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                            ],
                        ],

                        'Sexo'=>[
                            'items'=>['Masculino'=>'Masculino', 'Femenino'=>'Femenino'], 
                            'type'=>Form::INPUT_DROPDOWN_LIST
                        ],
                    ]
                ]);
            ?>

        <?= $form->field($model, 'Fecha_Nacimiento')->widget(\kartik\datecontrol\DateControl::classname(), [
                     'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
                     'ajaxConversion'=>false,
                     'widgetOptions' => [
                         'pluginOptions' => [
                             'autoclose' => true
                         ]
                     ]
            ]); ?>

        <?= $form->field($model, 'image')->label('Perfil')->widget(FileInput::classname(), [
            'options'=>[
                'accept'=>'image/*',
                //'multiple'=>true
                ],
            'pluginOptions'=>[
                    'showUpload' => false,
                    'showCancel' => false,
                    'allowedFileExtensions'=>['jpg','gif','png']
                ]
            ]);?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
