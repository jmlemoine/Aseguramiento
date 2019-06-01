<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PresentacionUser', 
        'relID' => 'presentacion-user', 
        'value' => \yii\helpers\Json::encode($model->presentacionUsers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UserAreaEspecializacion', 
        'relID' => 'user-area-especializacion', 
        'value' => \yii\helpers\Json::encode($model->userAreaEspecializacions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UserGradoAcademico', 
        'relID' => 'user-grado-academico', 
        'value' => \yii\helpers\Json::encode($model->userGradoAcademicos),
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

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

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
                'afiliacion_id'=>[
                    'type'=>Form::INPUT_WIDGET, 
                    'widgetClass'=>'\kartik\widgets\Select2', 
                    'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\Afiliacion::find()->orderBy('id')->asArray()->all(), 'id', 'Afiliacion'),
                        'options' => ['placeholder' => Yii::t('app', 'Elige Afiliacion')],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                    ],
                ],

                'tipo_user_id'=>[
                    'type'=>Form::INPUT_WIDGET, 
                    'widgetClass'=>'\kartik\widgets\Select2', 
                    'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\TipoUser::find()->orderBy('id')->asArray()->all(), 'id', 'Tipo'),
                        'options' => ['placeholder' => Yii::t('app', 'Elige Tipo')],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                    ],
                ],
                
            ]
        ]);
    ?>

    <?= Form::widget([
                'model'=>$model,
                'form'=>$form,
                'columns'=>2,
                'attributes'=>[
                    'username'=>['type'=>Form::INPUT_TEXT],
                    'email'=>['type'=>Form::INPUT_TEXT],
                ]
            ]);
    ?>

    <?= Form::widget([
                'model'=>$model,
                'form'=>$form,
                'columns'=>2,
                'attributes'=>[
                    'Telefono'=>['type'=>Form::INPUT_TEXT],
                    'Sexo'=>[
                        'type'=>Form::INPUT_DROPDOWN_LIST,
                        'items'=>['Masculino','Femenino'], 
                    ],
                ]
            ]);
    ?>

    <?= Form::widget([
                    'model'=>$model,
                    'form'=>$form,
                    'columns'=>2,
                    'attributes'=>[
                        'Fecha_Nacimiento'=>[
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\DatePicker',
                            'options'=>[
                                'pluginOptions' => [
                                    'autoclose' => true
                                ],
                            ], 
                        ],

                        'pais_id'=>[
                            'type'=>Form::INPUT_WIDGET, 
                            'widgetClass'=>'\kartik\widgets\Select2', 
                            'options'=>['data'=>\yii\helpers\ArrayHelper::map(\backend\models\Pais::find()->orderBy('id')->asArray()->all(), 'id', 'Pais'),
                                'options' => ['placeholder' => Yii::t('app', 'Elige Pais')],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                            ],
                        ],
                    ]
                ]);
            ?>

    
    
    <?= $form->field($model, 'Foto')->textInput(['placeholder' => 'Foto']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-comment"></i> ' . Html::encode(Yii::t('app', 'Presentaciones')),
            'content' => $this->render('_formPresentacionUser', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->presentacionUsers),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Areas de especializacion')),
            'content' => $this->render('_formUserAreaEspecializacion', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->userAreaEspecializacions),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Grados Academicos')),
            'content' => $this->render('_formUserGradoAcademico', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->userGradoAcademicos),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-inbox"></i> ' . Html::encode(Yii::t('app', 'Salas')),
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
