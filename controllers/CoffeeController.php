<?php

namespace app\controllers;

use Yii;
use app\models\Coins;
use app\models\Order;
use app\models\Products;
use app\models\ProductsSearch;

class CoffeeController extends \yii\web\Controller
{
    /**
     * Главная страница системы
    */
    public function actionIndex()
    {
        $productsSearchModel = new ProductsSearch();
        $productsDataProvider = $productsSearchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'customerModel' => $this->findModelByOwner('customer'),
            'coffeeMachineModel' => $this->findModelByOwner('coffeemachine'),
            'orderModel' => $this->getOrder(),
            'productsDataProvider' => $productsDataProvider,
        ]);
    }
    
    /**
     * Операция внесения монет в аппарат
    */
    public function actionAdd($coin)
    {
        $customerModel = $this->findModelByOwner('customer');
        $coffeeMachineModel = $this->findModelByOwner('coffeemachine');
        $order = $this->getOrder();
        $coins=Coins::getCoins();
        if ($customerModel->$coin > 0){
            $customerModel->$coin--;
            $coffeeMachineModel->$coin++;
            $order->credit += $coins[$coin];
            $customerModel->save();
            $coffeeMachineModel->save();
            $order->save();
        }
          return $this->redirect(['coffee/index']);
    }

    /**
     * Операция покупки товара
    */
    public function actionBuy($id)
    {
        $order = $this->getOrder();
        $product = $this->findProductByID($id);
        $order->credit -= $product->price;
        $order->save();
        $product->amount--;
        $product->save();
        return $this->redirect(['coffee/index']);
    }

    /**
     * Операция выдачи сдачи пользователю
     */
    public function actionWithdraw()
    {
        $customerModel = $this->findModelByOwner('customer');
        $order = $this->getOrder();
        $coffeeMachineModel = $this->findModelByOwner('coffeemachine');
        $coins=Coins::getCoins();
        arsort($coins);
        foreach ($coins as $coin => $nominal) {
            while ($nominal <= $order->credit && $order->credit > 0 && $coffeeMachineModel->$coin > 0) {
                $customerModel->$coin++;
                $coffeeMachineModel->$coin --;
                $order->credit -= $nominal;
            }
        }
        $coffeeMachineModel->save();
        $customerModel->save();
        $order->save();
        return $this->redirect(['coffee/index']);
    }

    /**
     * Finds the Coins model based on its owner value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $owner
     * @return Coins the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelByOwner($owner)
    {
        if (($model = Coins::findOne(['owner' => $owner])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Order model.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function getOrder()
    {
        if (($model = Order::find()->One()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the all the Products models.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findProducts()
    {
        if (($model = Products::find()->all()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Products model based on its id value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findProductByID($id)
    {
        if (($model = Products::findOne(['_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
