<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_anggota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(
        [
            'L' => 'L',
            'P' => 'P',
        ],
        [
            'prompt' => 'Pilih jenis kelamin'
        ]
    ) ?>

    <?= $form->field($model, 'is_admin')->dropDownList(
        [
            '0' => 'Admin',
            '1' => 'Member'
        ],
        ['prompt' => 'Pilih status akun']
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>