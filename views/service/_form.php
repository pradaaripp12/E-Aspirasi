<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Aspiration;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_master')->dropDownList(
        ArrayHelper::map(Aspiration::find()->all(),'id_master','judul'),
        [
            'prompt'=>'Pilih kasus'
        ]
    ); ?>

    <?= $form->field($model, 'dinas')->dropDownList(
        [
            'dishub' => 'Dinas Perhubungan',
            'dklh' => 'Dinas Kesehatan dan Lingkungan Hidup',
            'dikpol' => 'Dinas Kepolisian',
            'dpd' => 'Dewan Perwakilan Daerah'
        ],
        [
            'prompt' => 'Pilih Penanggap Kejadian'
        ]
    ) ?>

    <?= $form->field($model, 'jenis_layanan')->dropDownList(
        [
            'Baik' => 'Baik',
            'biasa' => 'Biasa',
            'tingkat' => 'Pelayanan Perlu Ditingkatkan',
            'tidaksop' => 'Tidak Sesuai SOP',
            'ganti' => 'Perlu Diganti',
        ],
        [
            'prompt' => 'Pilih Status Pelayanan'
        ]
    ) ?>

    <?= $form->field($model, 'review_layanan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
