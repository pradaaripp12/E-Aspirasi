<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProofSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proofs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proof-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Proof', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detail',
            [
                'label' => 'Bukti',
                'attribute' => 'file_path_foto',
                'format' => 'html',
                'value' => function($model){
                    return yii\bootstrap\Html::img($model->file_path_foto,['width' => '200']);
                }
            ],
            'title_foto',
            'keterangan_foto',
            'id_master',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
