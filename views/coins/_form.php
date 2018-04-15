<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Coins */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coins-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <h3><?= Html::encode($model->owner) ?></h3>

    <?= $form->field($model, 'one') ?>

    <?= $form->field($model, 'two') ?>

    <?= $form->field($model, 'five') ?>

    <?= $form->field($model, 'ten') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
