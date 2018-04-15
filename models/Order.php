<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "order".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $credit
 */
class Order extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['coffeemachine', 'order'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'credit',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['credit'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'credit' => 'Credit',
        ];
    }

}
