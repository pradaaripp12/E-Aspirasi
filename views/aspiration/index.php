<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AspirationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Kejahatan';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aspiration-index">
<div class="row">
        <?php echo \Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
        <div class="col-lg-8">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'layout' => '{items}{pager}',
        'beforeRow' => function($data) {

            if (!empty($data->securityProblem)) {
                return true;
            }

            return false;
        },
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Nomor',
                'attribute' => 'id_master'
            ],
            [
                'label' => 'Jenis Kejahatan',
                'attribute' => 'id_master',
                'value' => 'securityProblem.jenis_kejahatan'
            ],
            'tanggal',
            ['label' => 'Pengunggah',
                'attribute' => 'id_anggota',
            'value' => 'anggota.nama'
            ],
            [
            'label' => 'Wilayah',
              'attribute' =>  'id_wilayah',
              'value' => 'wilayah.nama_wilayah'
            ],[
                'label' => 'Status Laporan',
                'attribute' => 'status',
                'value' => function ($model) {
                    switch ($model->status) {
                        case 1: return 'Selesai';
                        case 0: return 'Sedang di Proses';
                    }
                }
            ],
            [
                'label' => 'Review Layanan',
                'attribute' => 'id_master',
                'value' => 'service.review_layanan'
            ],
            //'status',
            //'judul',
            //'deskripsi',
            //'tanggapan',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>

</div>
