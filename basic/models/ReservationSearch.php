<?php


namespace app\models;


class ReservationSearch extends app\models\Reservation
{
    public function attributes()
    {
        return array_merge(parent::attributes(), ['customer.surname']);
    }

    public function rules()
    {
        return array_merge(parent::rules(), [['customer.surname', 'safe']]);
    }
}