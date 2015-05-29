<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Войти в систему HunterLead';

?>

<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>

        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "                         
                        <div class=\"col-md-4\">{label}</div>
                        <div class=\"col-md-8\">{input}</div>\n
                        {error}"
                ],
            ]); ?>

            <?= $form->field($model, 'login')->label('Логин') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

            <?= $form->field($model, 'rememberMe',['template'=>"<div class=\"pull-right col-lg-6\">{input}{label}</div>\n<div class=\"col-lg-8\">{error}</div>"])->label('Запомнить меня') ->checkbox([],false)
            ?>

            <div class="form-group">
                <div class="col-lg-12">
                    <?= Html::submitButton('Залогинеться', ['class' => 'btn btn-success btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>


    </div>
</div>