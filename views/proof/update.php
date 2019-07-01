<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proof */

$this->title = 'Update Proof: ' . $model->id_detail;
$this->params['breadcrumbs'][] = ['label' => 'Proofs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detail, 'url' => ['view', 'id' => $model->id_detail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proof-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
