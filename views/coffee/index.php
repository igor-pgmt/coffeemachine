<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Button;
/* @var $this yii\web\View */
?>
<h3>Кошелёк покупателя</h3>

<?php
/* @var $this yii\web\View */
/* @var $model app\models\Coffee */

$this->params['breadcrumbs'][] = ['label' => 'Coffee', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coffee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $customerModel,
        'template' => '<tr><td width="300px" align="center">{label}</td><td width="200px" align="left">{value}</td></tr>',       
        'attributes' => [
            [
                'label' => Html::img('@web/images/one.jpg').Html::a('Внести монету в автомат', ['/coffee/add?coin=one']),
                'value' => $customerModel->one.' монет, '.$customerModel->one.' руб. ',  
            ],
            [
                'label' => Html::img('@web/images/two.jpg').Html::a('Внести монету в автомат', ['/coffee/add?coin=two']),
                'value' => $customerModel->two.' монет, '.($customerModel->two * 2).' руб.',            
            ],
            [
                'label' => Html::img('@web/images/five.jpg').Html::a('Внести монету в автомат', ['/coffee/add?coin=five']),
                'value' => $customerModel->five.' монет, '.($customerModel->five * 5).' руб.',            
            ],
            [
                'label' => Html::img('@web/images/ten.jpg').Html::a('Внести монету в автомат', ['/coffee/add?coin=ten']),
                'value' => $customerModel->ten.' монет, '.($customerModel->ten * 10).' руб.',            
            ],
        ],
    ]) ?>

<h3>Внесённая сумма</h3>

    <?= DetailView::widget([
        'model' => $orderModel,
        'template' => '<tr><td width="40px" align="center"><b>{label}</b></td><td>{value} руб.</td></tr>',       
        'attributes' => [
            [
                'label' => 'Внесено',
                'value' => $orderModel->credit,
            ]
        ],
    ]) ?>

<h3>Витрина аппарата</h3>

    <?= GridView::widget([
        'dataProvider' => $productsDataProvider,
        'layout' => '{items}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product',
            'amount',
            'price',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Купить',
                'template' => '{buy}',
                'buttons' => [
                    'buy' => function ($url, $product) use ($orderModel, $coffeeMachineModel){
                        if ($orderModel->credit >= $product->price && $product->amount > 0 ){
                        return Html::a(
                            '<span class="glyphicon glyphicon-download">Купить</span>',
                            $url 
                        );}
                    },
                ],
            ],
        ],
    ]); ?>

<?= Html::a('Выдать сдачу', ['/coffee/withdraw'], ['class'=>'btn btn-primary grid-button']) ?>

<br />

<h3>Кошелёк аппарата</h3>
    <?= DetailView::widget([
        'model' => $coffeeMachineModel,
        'template' => '<tr><td width="30px" align="center">{label}</td><td width="300px" align="center">{value}</td></tr>',       
        'attributes' => [
            [
                'label' => Html::img('@web/images/one.jpg'),
                'value' => $coffeeMachineModel->one.' монет, '.$coffeeMachineModel->one.' руб.',
            ],
            [
                'label' => Html::img('@web/images/two.jpg'),
                'value' => $coffeeMachineModel->two.' монет, '.($coffeeMachineModel->two * 2).' руб.',            
            ],
            [
                'label' => Html::img('@web/images/five.jpg'),
                'value' => $coffeeMachineModel->five.' монет, '.($coffeeMachineModel->five * 5).' руб.',            
            ],
            [
                'label' => Html::img('@web/images/ten.jpg'),
                'value' => $coffeeMachineModel->ten.' монет, '.($coffeeMachineModel->ten * 10).' руб.',            
            ],
        ],
    ]) ?>

</div>
