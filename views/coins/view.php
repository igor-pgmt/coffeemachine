<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Coins */

$this->title = $model->_id;
$this->params['breadcrumbs'][] = ['label' => 'Coins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coins-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'owner',
            'one',
            'two',
            'five',
            'ten',
        ],
    ]) ?>

</div>
