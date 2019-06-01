<div class="form-group" id="add-presentacion">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\widgets\DateTimePicker;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Presentacion',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'sala_id' => [
            'label' => 'Sala',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Sala::find()->orderBy('Nombre_Sala')->asArray()->all(), 'id', 'Nombre_Sala'),
                'options' => ['placeholder' => Yii::t('app', 'Elige Sala')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'Titulo' => ['type' => TabularForm::INPUT_TEXT],
        'Institucion' => ['type' => TabularForm::INPUT_TEXT],
        'Area_Tematica' => ['type' => TabularForm::INPUT_TEXT],
        'Modalidad_Presentacion' => ['type' => TabularForm::INPUT_TEXT],
        'Fecha_Inicio'=>[
            'type'=>TabularForm::INPUT_WIDGET, 
            'widgetClass'=>'\kartik\widgets\DateTimePicker', 
            'options' =>[
                'pluginOptions' => [
                    'pickerPosition' => 'top-left',
                    'autoclose' => true
                ]

            ]
            
        ],

        'Fecha_Inicio'=>[
            'type'=>TabularForm::INPUT_WIDGET, 
            'widgetClass'=>'\kartik\widgets\DateTimePicker', 
            'options' =>[
                'pluginOptions' => [
                    'pickerPosition' => 'top-left',
                    'autoclose' => true
                ]

            ]
            
        ],

        'Fecha_Final'=>[
            'type'=>TabularForm::INPUT_WIDGET, 
            'widgetClass'=>'\kartik\widgets\DateTimePicker', 
            'options' =>[
                'pluginOptions' => [
                    'pickerPosition' => 'top-left',
                    'autoclose' => true
                ]

            ]
            
        ],
        /*
        'Fecha_Inicio' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Elige Fecha Inicio'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'Fecha_Final' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Elige Fecha Final'),
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        */
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Eliminar'), 'onClick' => 'delRowPresentacion(' . $key . '); return false;', 'id' => 'presentacion-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Añadir Presentacion'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPresentacion()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

