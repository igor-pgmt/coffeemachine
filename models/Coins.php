<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "coins".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $owner
 * @property mixed $one
 * @property mixed $two
 * @property mixed $five
 * @property mixed $ten
 */
class Coins extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['coffeemachine', 'coins'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'owner',
            'one',
            'two',
            'five',
            'ten',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'one', 'two', 'five', 'ten'], 'integer', 'min' => 0],
            [['owner'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'owner' => 'Owner',
            'one' => 'One',
            'two' => 'Two',
            'five' => 'Five',
            'ten' => 'Ten',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getCoins()
    {
        return [
            'one' => 1,
            'two' => 2,
            'five' => 5,
            'ten' => 10,
        ];
    }
}
