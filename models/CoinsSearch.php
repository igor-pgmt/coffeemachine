<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coins;

/**
 * CoinsSearch represents the model behind the search form of `app\models\Coins`.
 */
class CoinsSearch extends Coins
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'owner', 'one', 'two', 'five', 'ten'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Coins::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'owner', $this->owner])
            ->andFilterWhere(['like', 'one', $this->one])
            ->andFilterWhere(['like', 'two', $this->two])
            ->andFilterWhere(['like', 'five', $this->five])
            ->andFilterWhere(['like', 'ten', $this->ten]);

        return $dataProvider;
    }
}
