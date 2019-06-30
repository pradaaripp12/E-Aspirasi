<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\DynamicModel;

use kartik\date\DatePicker;
use app\models\Aspiration;

/* @var $this yii\web\View */
/* @var $model app\models\Aspiration */
/* @var $form yii\widgets\ActiveForm */

$dynamic_model = new DynamicModel(['jenis_aspirasi']);
$dynamic_model->addRule('jenis_aspirasi', 'required');
?>

<div class="aspiration-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($dynamic_model, 'jenis_aspirasi')->dropDownList([
        'A' => 'Infrastruktur',
        'B' => 'Keamanan'
    ],
    [
        'prompt' => 'Pilih jenis aspirasi'
    ]) ?>

    <?= $form->field($model, 'id_anggota')->label(false)->hiddenInput(['value' => Yii::$app->user->identity->id_anggota]) ?>


    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tanggal')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Masukkan tanggal aspirasi'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'id_wilayah')->label('Lokasi')->dropDownList(
        Aspiration::getLokasi(),
        [
            'prompt' => 'Pilih lokasi kejadian'
        ]
    ) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggapan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>