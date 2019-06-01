<div class="form-group" id="add-user">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'User',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'Nombre' => ['type' => TabularForm::INPUT_TEXT],
        'Apellido' => ['type' => TabularForm::INPUT_TEXT],
        'afiliacion_id' => [
            'label' => 'Afiliacion',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Afiliacion::find()->orderBy('Afiliacion')->asArray()->all(), 'id', 'Afiliacion'),
                'options' => ['placeholder' => Yii::t('app', 'Elige Afiliacion')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'tipo_user_id' => [
            'label' => 'Tipo user',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\TipoUser::find()->orderBy('Tipo')->asArray()->all(), 'id', 'Tipo'),
                'options' => ['placeholder' => Yii::t('app', 'Elige Tipo user')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'username' => ['type' => TabularForm::INPUT_TEXT],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'Telefono' => ['type' => TabularForm::INPUT_TEXT],
        'Sexo' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Masculino' => 'Masculino', 'Femenino' => 'Femenino', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Elige Sexo')],
                    ]
        ],
        'Fecha_Nacimiento' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Elige Fecha Nacimiento'),
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'Foto' => ['type' => TabularForm::INPUT_TEXT],
        'filename' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Eliminar'), 'onClick' => 'delRowUser(' . $key . '); return false;', 'id' => 'user-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Añadir Usuario'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUser()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

