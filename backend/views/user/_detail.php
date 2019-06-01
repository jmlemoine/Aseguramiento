<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'Nombre',
        'Apellido',
        [
            'attribute' => 'afiliacion.Afiliacion',
            'label' => Yii::t('app', 'Afiliacion'),
        ],
        [
            'attribute' => 'tipoUser.Tipo',
            'label' => Yii::t('app', 'Tipo'),
        ],
        [
            'attribute' => 'pais.Pais',
            'label' => Yii::t('app', 'Pais'),
        ],
        'username',
        'email:email',
        'Telefono',
        'Sexo',
        'Fecha_Nacimiento',
        //'Foto',
        //'filename',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>