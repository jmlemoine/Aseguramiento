<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserGradoAcademico */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Grado academicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-grado-academico-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'User Grado Academico').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'user.username',
                'label' => Yii::t('app', 'Usuario')
            ],
        [
                'attribute' => 'gradoAcademico.Grado',
                'label' => Yii::t('app', 'Grado Academico')
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
