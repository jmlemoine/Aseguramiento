<?php
/*
@var $this yii\web\View
@var $form yii\bootstrap\ActiveForm
@var $model \common\models\LoginForm
*/
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = $this->title='Inicio de Sesión';
?>

 <div class="card mb-3 wow fadeIn">
 <div class="card-header font-weight-bold">
 <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::encode($this->title) ?></h1>
 </div>
    <div class="card-body">
    <br>
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por favor, llene todos los campos para acceder a su cuenta.</h4>
    <br>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <h5><?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?></h5>
                <br>
                <h5><?= $form->field($model, 'password')->passwordInput() ?></h5>
                <br>
                <h5><?= $form->field($model, 'rememberMe')->checkbox() ?></h5>

                <div style="color:#999;margin:1em 0">
                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.</h5>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
    </div>
</div>
