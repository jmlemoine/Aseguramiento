<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = $this->title='Registro de Usuario - MESCyT';
?>


 
 <div class="card mb-3 wow fadeIn">
 
 <div class="card-header font-weight-bold">
 
 
 <br>
 <h1><?= Html::encode($this->title) ?></h1>
 </div>
 <div class="card-body">
    <br>
    <h4 style="font-family: arial">Por favor, llene todos los campos para registrar a su cuenta.</h4>
    <br>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                
                
                
                <h5><?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?></h5>
                <br>
                <h5><?= $form->field($model, 'email') ?></h5>
                <br>
                <h5><?= $form->field($model, 'password')->passwordInput() ?></h5>
                <br>

                <h5><?= $form->field($model, 'Nombre')->textInput(['autofocus' => true]) ?></h5>
                <br>

                <h5><?= $form->field($model, 'Apellido')->textInput(['autofocus' => true]) ?></h5>
                <br>


                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
    </div>
</div>