<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Region;
use app\models\Infrastructure;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SecurityProblemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Kejahatan';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-problem-index">
        <div class="row">
        <?php echo Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
            <div class="col-lg-8">
                <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Security Problem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Nomer Laporan',
                'attribute' => 'id_master',
            ],
            // [
            //     'label' =>'Wilayah',
            //     'attribute' =>'id_master',
            //     'value' => function($model){
            //         $wilayah = Region::find()->where('id_wilayah')
            //     }
            // ],
            'jenis_kejahatan',
            'longtitude',
            'latitude',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
