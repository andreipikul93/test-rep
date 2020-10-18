<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Reservation;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;


class ReservationsController extends Controller
{
    public function actionGrid()
    {
        $query = Reservation::find();

        $reservation = Yii::$app->request->get('Reservation', 0);
        $searchModel = new \app\models\ReservationSearch();
        if (isset($_GET['ReservationSearch']))
        {
            $searchModel->load(Yii::$app->request->get());

            $query->joinWith(['customer']);
            $query->andFilterWhere(
                ['LIKE', 'customers.surname', $searchModel->getAttribute('customer.surname')]
            );
            $query->andFilterWhere([
                'id'=>$searchModel->id,
                'customer_id'=>$searchModel->customer_id,
                'room_id'=>$searchModel->room_id,
                'price_per_day'=>$searchModel->price_per_day,
            ]);
        }
        if ($reservation) {
            $searchModel->load(['Reservation'=>$reservation]);
            $query->andFilterWhere([
                'id' => $searchModel->id,
                'customer_id' => $searchModel->customer_id,
                'room_id' => $searchModel->room_id,
                'price_per_day' => $searchModel->price_per_day
            ]);
        }

        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>['pageSize'=>10]
        ]);

        return $this->render('grid', ['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel]);
    }

    /*public function actionDetailDependentDropdown()
    {
        $showDetails = false;
        $model = new Reservation();
        if (isset($_POST['Reservation'])) {
            $model->load(Yii::$app->request->post());

            if (isset($_POST['Reservation']['id']) && ($_POST['Reservation']['id']) != NULL) {
                $model = Reservation::findOne($_POST);
            }
        }
    }*/



}