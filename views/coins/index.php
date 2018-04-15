<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CoinsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coins-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'owner',
            'one',
            'two',
            'five',
            'ten',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Изменить',
                'template'=>'{update}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
