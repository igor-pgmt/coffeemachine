<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "products".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $product
 * @property mixed $price
 * @property mixed $amount
 */
class Products extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['coffeemachine', 'products'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'product',
            'price',
            'amount',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'product'], 'safe'],
            [['price', 'amount'], 'integer', 'min' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'product' => 'Товар',
            'price' => 'Цена',
            'amount' => 'Количество',
        ];
    }
}
