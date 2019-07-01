<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\DynamicModel;
use kartik\date\DatePicker;
use app\models\Aspiration;
use app\models\Infrastructure;
use app\models\SecurityProblem;
use app\models\Proof;
use app\models\Service;

/* @var $this yii\web\View */
/* @var $model app\models\Aspiration */
/* @var $form yii\widgets\ActiveForm */

$dynamic_model = new DynamicModel(['jenis_aspirasi']);
$dynamic_model->addRule('jenis_aspirasi', 'required');

$inf_model = new Infrastructure;
$sec_model = new SecurityProblem;
$proof_model = new Proof;
?>

<div class="aspiration-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>
    <?= $form->field($dynamic_model, 'jenis_aspirasi')->dropDownList(
        [
            'infrastruktur' => 'Infrastruktur',
            'kejahatan' => 'Kejahatan'
        ],
        [
            'prompt' => 'Pilih jenis aspirasi'
        ]
    ) ?>

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
                'prompt' => 'Pilih lokasi'
            ]
        ) ?>

        <?= $form->field($model, 'status')->label(false)->hiddenInput(['value' => '1']) ?>

        <?= $form->field($model, 'tanggapan')->label(false)->hiddenInput() ?>
        <div id="map">
        </div><br>
        <div id="infrastruktur" class="hidden-form" style="display:none">
            <?= $form->field($inf_model, 'latitude', ['options' => ['style' => 'width:49%;float:left;']])->textInput() ?>
            <?= $form->field($inf_model, 'longtitude',['options' => ['style' => 'width:49%;float:right;']])->textInput() ?>
            <?= $form->field($inf_model, 'jenis_infrastruktur', ['options' => ['style' => 'width:49%;float:left;']])->dropDownList(
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
            <?= $form->field($inf_model, 'status_infrastruktur', ['options' => ['style' => 'width:49%;float:right;']])->dropDownList(
                [
                    'Baik' => 'Baik',
                    'Perlu Perbaikan' => 'Perlu perbaikan',
                    'Rusak' => 'Rusak',
                    'Rusak Parah' => 'Rusak Parah',
                    'Tidak Dapat Digunakan' => 'Tidak Dapat Digunakan'
                ],
                [
                    'prompt' => 'Pilih status infrastruktur'
                ]
            ); ?>
        </div>
        <div id="kejahatan" class="hidden-form" style="display:none">
            <?= $form->field($sec_model, 'jenis_kejahatan', ['options' => ['style' => 'width:30%;float:left;margin-right:15px;']])->dropDownList(
                [
                    'Pembunuhan' => 'Pembunuhan',
                    'Penganiayaan' => 'Penganiayaan',
                    'Pencurian' => 'Pencurian',
                    'Kejahatan Seksual' => 'Kejahatan Seksual',
                    'Begal' => 'Begal'
                ],
                [
                    'prompt' => 'Pilih jenis kejahatan'
                ]
            ) ?>
            <?= $form->field($sec_model, 'latitude', ['options' => ['style' => 'width:30%;float:left;margin-left:25px;;margin-right:15px;']])->textInput() ?>
            <?= $form->field($sec_model, 'longtitude', ['options' => ['style' => 'width:30%;float:right;margin-left:15px;']])->textInput() ?>
        </div>


        <?= $form->field($model, 'deskripsi')->textArea() ?>
        <?= $form->field($proof_model, 'file_path_foto')->label('Bukti Foto')->fileInput() ?>
        <?= $form->field($proof_model, 'keterangan_foto')->label('Keterangan Foto')->textarea() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>


</div>