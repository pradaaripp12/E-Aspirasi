<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AspirationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aspiration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_master') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'id_anggota') ?>

    <?= $form->field($model, 'id_wilayah') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'judul') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'tanggapan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
