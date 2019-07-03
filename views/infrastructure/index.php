<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InfrastructureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Infrastruktur';

?>

<div class="infrastructure-index">
<div class="row">
        <?php echo \Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
        <div class="col-lg-8">

    <h1><?= Html::encode($this->title) ?></h1>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'layout' => '{items}{pager}',     
        'columns' => [
            [
                'label' => 'Nomor',
                'attribute' => 'id_master'
            ],            [
                'label' => 'Judul',
                'attribute' => 'id_master',
                'value' => 'master.judul'
            ],[
                'label' => 'Tanggal',
                'attribute' => 'id_master',
                'value' => 'master.tanggal'
            ],[
                'label' => 'Pelapor',
                'attribute' => 'id_master',
                'value' => 'master.id_anggota'
            ],[
                'label' => 'Status',
                'attribute' => 'status_infrastruktur',
            ],[
                'label' => 'Jenis',
                'attribute' => 'jenis_infrastruktur',
            ],
            [
                'label' => 'Status Laporan',
                'attribute' => 'id_master',
                'value' => function ($model) {
                    switch ($model->master->status) {
                        case 1: return 'Selesai';
                        case 0: return 'Sedang di Proses';
                    }
                }
            ],
            

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
</div>
