<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SecurityProblem */

$this->title = 'Create Security Problem';
$this->params['breadcrumbs'][] = ['label' => 'Security Problems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="security-problem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
