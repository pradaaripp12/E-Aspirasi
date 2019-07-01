<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProofSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proof-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_detail') ?>

    <?= $form->field($model, 'file_path_foto') ?>

    <?= $form->field($model, 'title_foto') ?>

    <?= $form->field($model, 'keterangan_foto') ?>

    <?= $form->field($model, 'id_master') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
