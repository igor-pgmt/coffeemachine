<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CoinsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coins-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, '_id') ?>

    <?= $form->field($model, 'owner') ?>

    <?= $form->field($model, 'one') ?>

    <?= $form->field($model, 'two') ?>

    <?= $form->field($model, 'five') ?>

    <?php // echo $form->field($model, 'ten') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
