<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservation;

/**
 * ReservationSearh represents the model behind the search form of `\app\models\Reservation`.
 */
class ReservationSearh extends Reservation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'room_id'], 'integer'],
            [['price_per_day'], 'number'],
            [['date_from', 'date_to', 'reservation_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Reservation::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'price_per_day' => $this->price_per_day,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'reservation_date' => $this->reservation_date,
            'room_id' => $this->room_id,
        ]);

        return $dataProvider;
    }
}
