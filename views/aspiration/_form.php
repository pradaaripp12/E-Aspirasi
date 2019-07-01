<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\DynamicModel;
use kartik\date\DatePicker;
use app\models\Aspiration;
use app\models\Infrastructure;
use app\models\SecurityProblem;
use app\models\Service;

/* @var $this yii\web\View */
/* @var $model app\models\Aspiration */
/* @var $form yii\widgets\ActiveForm */

$dynamic_model = new DynamicModel(['jenis_aspirasi']);
$dynamic_model->addRule('jenis_aspirasi', 'required');

$inf_model = new Infrastructure;
$sec_model = new SecurityProblem;
?>

<div class="aspiration-form">

    <?php $form = ActiveForm::begin(); ?>
<<<<<<< HEAD
    <?= $form->field($dynamic_model, 'jenis_aspirasi')->dropDownList([
        'infrastruktur' => 'Infrastruktur',
        'kejahatan' => 'Kejahatan'
    ],
    [
        'prompt' => 'Pilih jenis aspirasi'
    ]) ?>

    <div id="jenis" style='display:none'>
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
=======
    <?= $form->field($dynamic_model, 'jenis_aspirasi')->dropDownList(
        [
            'infrastruktur' => 'Infrastruktur',
            'kejahatan' => 'Kejahatan'
        ],
>>>>>>> cffb8897bae5cdd63b8fd90e52435c6cbb583b71
        [
            'prompt' => 'Pilih jenis aspirasi'
        ]
    ) ?>

<<<<<<< HEAD
    <?= $form->field($model, 'status')->label(false)->hiddenInput(['value' => '1']) ?>

    <?= $form->field($model, 'tanggapan')->label(false)->hiddenInput() ?>
    <div id="map">
            </div><br>
            <div id="infrastruktur" class="hidden-form" style="display:none">
            <?= $form->field($inf_model, 'latitude')->textInput(['class' => 'form-control class-content-title_series', 'disabled' => true]) ?>
                <?= $form->field($inf_model, 'longtitude')->textInput(['class' => 'form-control class-content-title_series', 'disabled' => true]) ?>
                <?= $form->field($inf_model, 'jenis_infrastruktur')->dropDownList([
                 'jalan' => 'Jalan',
                 'jembatan' => 'Jembatan'
    ],
    [
        'prompt' => 'Pilih jenis infrastruktur'
    ]) ?>
                <?= $form->field($inf_model, 'status_infrastruktur')->textInput(['maxlength' => true]) ?>
            </div>

            <div id="kejahatan" class="hidden-form" style="display:none">
            <?= $form->field($sec_model, 'jenis_kejahatan')->textInput(['maxlength' => true]) ?>
            <?= $form->field($sec_model, 'latitude')->textInput(['class' => 'form-control class-content-title_series', 'disabled' => true]) ?>
            <?= $form->field($sec_model, 'longtitude')->textInput(['class' => 'form-control class-content-title_series', 'disabled' => true]) ?>
            </div>


            <?= $form->field($model, 'deskripsi')->textArea() ?>
=======
    <div id="jenis" style='display:none'>
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

        <?= $form->field($model, 'status')->label(false)->hiddenInput(['value' => '1']) ?>

        <?= $form->field($model, 'tanggapan')->label(false)->hiddenInput() ?>

        <div id="infrastruktur" class="hidden-form" style="display:none">

            <?= $form->field($inf_model, 'longtitude')->textInput(['maxlength' => true]) ?>
            <?= $form->field($inf_model, 'latitude')->textInput(['maxlength' => true]) ?>
            <?= $form->field($inf_model, 'jenis_infrastruktur')->dropDownList(
                [
                    'jalan' => 'Jalan Raya',
                    'gedung' => 'Gedung Pertemuan',
                    'kantor' => 'Kantor',
                    'jembatan' => 'Jembatan'
                ],
                [
                    'prompt' => 'Pilih jenis infrastruktur'
                ]
            ) ?>
            <?= $form->field($inf_model, 'status_infrastruktur')->radioList([
                'Baik' => 'Baik',
                'Perlu Perbaikan' => 'Perlu perbaikan',
                'Rusak' => 'Rusak',
                'Rusak Parah' => 'Rusak Parah',
                'Tidak Dapat Digunakan' => 'Tidak Dapat Digunakan']
            ); ?>
        </div>

        <div id="kejahatan" class="hidden-form" style="display:none">
            <?= $form->field($sec_model, 'jenis_kejahatan')->dropDownList(
                [
                    'pembunuhan' => 'Pembunuhan',
                    'penganiayaan' => 'Penganiayaan',
                    'pencurian' => 'Pencurian',
                    'seksual' => 'Kejahatan Seksual',
                    'begal' => 'Begal'
                ],
                [
                    'prompt' => 'Pilih jenis kejahatan'
                ]
            ) ?>
            <?= $form->field($sec_model, 'longtitude')->textInput(['maxlength' => true]) ?>
            <?= $form->field($sec_model, 'latitude')->textInput(['maxlength' => true]) ?>
        </div>

        <?= $form->field($model, 'deskripsi')->textArea() ?>
>>>>>>> cffb8897bae5cdd63b8fd90e52435c6cbb583b71

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>


</div>