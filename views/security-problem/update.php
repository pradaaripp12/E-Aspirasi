<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SecurityProblem */

$this->title = 'Update Security Problem: ' . $model->id_master;
$this->params['breadcrumbs'][] = ['label' => 'Security Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_master, 'url' => ['view', 'id' => $model->id_master]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="security-problem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
