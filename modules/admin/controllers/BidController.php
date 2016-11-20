<?php

namespace app\modules\admin\controllers;

use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;
use app\models\Part;
use app\models\Product;

class BidController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $checkBid = new ActiveDataProvider([
            'query' => Part::find()->where(['not', ['vol_id' => null]]),
        ]);

        $uncheckBid = new ActiveDataProvider([
            'query' => Part::find()->where(['vol_id' => null]),
        ]);

        return $this->render('index', [
            'checkBid' => $checkBid,
            'uncheckBid' => $uncheckBid,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        $model = Part::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getPositions(),
        ]);

        return $this->render('view', [
            'model' => $model,
            'positions' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Part::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->vol_id == NULL)
            {
                $model->status_id = 4;
            }
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

    public function actionAdd()
    {
        $model = new Product();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            $name = Yii::$app->request->post('name');
//            $quantity = Yii::$app->request->post('quantity');
//
//            $session = Yii::$app->session;
//            $session->open();
//
//            $_SESSION['product'] = [
//                'quantity' => $quantity,
//                'name' => $name,
//            ];
//
//            echo "<pre>";
//            var_dump($_SESSION['product']);
//            echo "</pre>";
//        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
