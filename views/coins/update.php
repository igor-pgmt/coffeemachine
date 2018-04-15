<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coins */

$this->title = 'Update Coins: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Coins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_id, 'url' => ['view', 'id' => (string)$model->_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coins-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
