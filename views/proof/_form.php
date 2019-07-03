<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proof */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proof-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]]); ?>

    <?= $form->field($model, 'file_path_foto')->label('Bukti Foto')->fileInput() ?>

    <?= $form->field($model, 'title_foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan_foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_master')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
