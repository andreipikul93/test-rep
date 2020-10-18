<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Room;
use yii\web\UploadedFile;

class RoomsController extends Controller {

    public function actionCreate()
    {
        $model = new Room();
        $modelCanSave = false;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');

            if ($model->fileImage) {
                $model->fileImage->saveAs(Yii::getAlias('@uploadedfilesdir')."/".$model->fileImage->name);
            } else {
                echo "<h1>FILE IMAGE NOT LOADED</h1>";
            }

            $modelCanSave = true;
        }

        return $this->render('create', ['model'=>$model, 'modelSaved'=>$modelCanSave]);
    }






}