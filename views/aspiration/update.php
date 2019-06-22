<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aspiration */

$this->title = 'Update Aspiration: ' . $model->id_master;
$this->params['breadcrumbs'][] = ['label' => 'Aspirations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_master, 'url' => ['view', 'id' => $model->id_master]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aspiration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
