<?php ?>

<h2>News Item detail</h2>
<br />
Title: <b><a href="<?php echo Yii::$app->urlManager->createUrl(['news/item-detail', 'title'=>$item['title']]);?>">
        <?php echo $item['title']; ?></a>
    </b>
<br />
Date: <b><?php echo $item['date']; ?></b>


