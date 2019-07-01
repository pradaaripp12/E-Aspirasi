<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aspiration */

 $this->title = 'Sampaikan Aspirasi';
// $this->params['breadcrumbs'][] = ['label' => 'Aspirations', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="aspiration-create">
    <div class="body-content">
        
        <div class="row">
        <?php echo \Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
            <div class="col-lg-8">
                <h1><?= Html::encode($this->title) ?></h1>

                

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>
