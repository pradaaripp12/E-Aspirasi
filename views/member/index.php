<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
?>
<div class="member-index">

    

    <div class="row">
        <?php echo \Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
        <div class="col-lg-8">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
        <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_anggota',
            // 'password',
            'nama',
            'alamat',
            // 'no_hp',
            //'jenis_kelamin',
            'is_admin',

            ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>
        </div>
    </div>
    


</div>
