<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class NewsController extends Controller {

    public function data()
    {
        return [
            ['id'=>1, "date"=>'2015-04-19', 'category'=>'business', 'title'=>"Test news of 2015-04-19"],
            ['id'=>2, "date"=>'2015-05-20', 'category'=>'shopping', 'title'=>"Test news of 2015-05-20"],
            ['id'=>3, "date"=>'2015-06-21', 'category'=>'business', 'title'=>"Test news of 2015-06-21"],
            ['id'=>4, "date"=>'2016-04-19', 'category'=>'shopping', 'title'=>"Test news of 2016-04-19"],
            ['id'=>5, "date"=>'2017-05-19', 'category'=>'business', 'title'=>"Test news of 2017-05-19"],
            ['id'=>6, "date"=>'2018-06-19', 'category'=>'shopping', 'title'=>"Test news of 2018-06-19"]
        ];
    }

    public function actionItemsList()
    {
        Yii::$app->language = "hispanics";

        $year = Yii::$app->request->get('year');
        $category = Yii::$app->request->get('category');
        $data = $this->data();
        $filteredData = [];

        foreach ($data as $d) {
            if (($year != null) && (date('Y', strtotime($d['date'])))) {
                $filteredData[] = $d;
            }
            if (($category != null) && ($d['category'] == $category)) {
                $filteredData[] = $d;
            }
            return $this->render('itemsList', ['year'=>$year, 'category'=>$category, 'filteredData'=>$filteredData]);
        }
    }

   public function actionResponsiveContentTest()
   {
       $responsive = Yii::$app->request->get('responsive', 0);
       if ($responsive) {
           $this->layout = 'responsive';
       } else {
           $this->layout = 'main';
       }

       return $this->render('responsiveContentTest', ['responsive'=>$responsive]);
   }


    public function actionIndex()
    {
        echo "this is my first controller";
    }

    public function dataItems()
    {
        $newsList = [
            ['title'=>'First World War', 'date'=>'1914-07-28'],
            ['title'=>'Second World War', 'date'=>'1939-07-28'],
            ['title'=>'First man on the moon', 'date'=>'1969-07-28'],
        ];
        return $newsList;
    }

    public function actionListItems()
    {
        $newsList = $this->dataItems();
        return $this->render('ItemList', ['newsList' => $newsList]);
    }

    public function actionItemDetail($title)
    {
        $newsList = $this->dataItems();
        $item = null;
        foreach ($newsList as $n) {
            if ($title == $n['title']) {
                $item = $n;
                break;
            }
        }
        return $this->render('itemDetail', ['item'=>$item]);
    }



}