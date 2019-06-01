<div class="form-group" id="add-user-sala">
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
    'formName' => 'UserSala',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'user_id' => [
            'label' => 'Moderador',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                //'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('Nombre')->asArray()->all(), 'id', 'Nombre'),
                'data' => \yii\helpers\ArrayHelper::map(
                    \backend\models\User::find()->where(['tipo_user_id' => 2])->asArray()->all(), 'id',
                    function($model) {
                        return $model['Nombre'].' '.$model['Apellido'];
                    }
                ),
                'options' => ['placeholder' => Yii::t('app', 'Elige Usuario')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Eliminar'), 'onClick' => 'delRowUserSala(' . $key . '); return false;', 'id' => 'user-sala-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Añadir Moderador'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUserSala()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

