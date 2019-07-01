<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InfrastructureSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="infrastructure-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_master') ?>

    <?= $form->field($model, 'longtitude') ?>

    <?= $form->field($model, 'latitude') ?>

    <?= $form->field($model, 'status_infrastruktur') ?>

    <?= $form->field($model, 'jenis_infrastruktur') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
