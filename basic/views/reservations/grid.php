<?php

use yii\grid\GridView;
use yii\helpers\Html;

//$roomsFilterData = yii\helpers\ArrayHelper::map(app\models\Room::find()->all(), 'id', function($model, $defaultValue) {
//    return sprint('Floor: %d - Number %d', $model->floor, $model->room_number);
//});

?>

    <h2>Reservations</h2>
<?=
GridView::widget([
    'filterModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'customer_id',
        'price_per_day',
        'date_from',
        'date_to',
        'reservation_date',
        'room_id',
        [
            'class'=>'yii\grid\ActionColumn',
            'template'=>'{delete}',
            'header'=>'Actions'
        ]
        /*'columns' => [
                'id', [
                    'header'=>'Room',
                    /*'filter'=>Html::activeDropDownList($searchModel, 'room_id', $roomsFilterData, ['prompt'=>'----all']),
                    'content' => function($model) {
                        return $model->room->floor;
                    }*/
                /*]
            ]*/
        ]
]);




?>