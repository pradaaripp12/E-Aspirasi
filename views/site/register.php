<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to register:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>{error}",
            'labelOptions' => ['class' => 'col-lg-2 control-label', 'style' => 'text-align:left; width:12%;'],
        ],
    ]); ?>

<div class="member-form">

<?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label('Nama Lengkap') ?>

<?= $form->field($model, 'id_anggota')->textInput(['maxlength' => true])->label('Username') ?>

<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'no_hp')->textInput(['maxlength' => true])->label('Nomer HP') ?>

<?= $form->field($model, 'jenis_kelamin')->dropDownList(
        [
            'L' => 'Laki-Laki',
            'P' => 'Perempuan',
        ],
        [
            'prompt' => 'Pilih jenis kelamin'
        ]
    ) ?>
    

    <?= $form->field($model,'is_admin')->label(false)->hiddenInput(['value' =>'0']);?>

<div class="form-group" style="width:45%;">
    <?= Html::submitButton('Register', ['class' => 'btn btn-primary','style' => 'float:right;']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

    <!-- <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div> -->
</div>