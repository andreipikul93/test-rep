<?php


namespace app\controllers;


use Yii;
use yii\data\ActiveDataProvider;
use yii\web\controller;
use app\models\Customer;

class CustomersController extends Controller
{
    public function actionGrid()
    {
        $query = Customer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ["pageSize" => 10]
        ]);

        return $this->render('grid', ['dataProvider'=>$dataProvider]);
    }







}