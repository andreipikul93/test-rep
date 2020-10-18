<?php
    use yii\helpers\Url;
    use yii\helpers\Html;

    if ($year != null) {
        echo '<b>List for year '.$year.'</b>';
    }
    if ($category != null) {
        echo "<b>List for category $category</b>";
    }
    echo "<br /><br />";
    echo $this->context->renderPartial('_copyright');

    echo Url::to(['news/items-list', 'year'=>'2016']);

    echo "<p>".Yii::$app->language."</p>";
?>

<table>
   <tr>
        <th>Date</th>
        <th>Category</th>
        <th>Title</th>
   </tr>

    <?php foreach ($filteredData as $fd) { ?>
        <tr>
            <td><?php echo $fd['date']; ?></td>
            <td><?php echo $fd['category']; ?></td>
            <td><?php echo $fd['title']; ?></td>
        </tr>
        <?php } ?>


</table>




