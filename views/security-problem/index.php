<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SecurityProblemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Security Problems';

?>

<div class="security-problem-index">
<div class="row">
        <?php echo \Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
        <div class="col-lg-8">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Security Problem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_master',
            'jenis_kejahatan',
            'longtitude',
            'latitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
