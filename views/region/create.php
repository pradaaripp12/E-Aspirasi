<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Region */

$this->title = 'Create Region';
// $this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-create">
<?php echo \Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
    <div class="col-lg-8">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
