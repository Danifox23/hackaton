<?php

namespace app\modules\admin\controllers;

use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;

class VolunteerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['role_id' => 1]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $model->date = time();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        $model = User::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getVolParts(),
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'parts' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->role_id = 2;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
