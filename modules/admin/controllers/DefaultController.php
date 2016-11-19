<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

use app\models\Position;
use app\models\Part;
use app\models\User;
use app\models\Spot;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $products = Position::find()->all();
        $complete = Part::find()->where(['status_id' => 3])->all();
        $vol = User::find()->where(['role_id' => 2])->all();
        $rest = User::find()->where(['role_id' => 3])->all();

        $spots = Spot::find()->all();

        return $this->render('index', [
            'products' => $products,
            'complete' => $complete,
            'vol' => $vol,
            'rest' => $rest,
            'spots' => $spots,
        ]);
    }

    public function actionPeriod()
    {
        if (Yii::$app->request->post()) {
            $period = Yii::$app->request->post('period');
            $rightTime = time();
            $leftTime = [
                'all' => 0,
                'year' => $rightTime - 31556926,
                'month' => $rightTime - 2629743,
                'week' => $rightTime - 604800,
                'day' => $rightTime - 86400,
            ];

            $products = Position::find()->where('date >= :leftTime and date <= :rightTime', [':leftTime' => $leftTime[$period], ':rightTime' => $rightTime])->all();
            $complete = Part::find()->where('status_id = 3 and date >= :leftTime and date <= :rightTime', [':leftTime' => $leftTime[$period], ':rightTime' => $rightTime])->all();
            $vol = User::find()->where('role_id = 2 and date >= :leftTime and date <= :rightTime', [':leftTime' => $leftTime[$period], ':rightTime' => $rightTime])->all();
            $rest = User::find()->where('role_id = 3 and date >= :leftTime and date <= :rightTime', [':leftTime' => $leftTime[$period], ':rightTime' => $rightTime])->all();

            $this->layout = false;
            return $this->render('main_info_period', [
                'products' => $products,
                'complete' => $complete,
                'vol' => $vol,
                'rest' => $rest,
            ]);
        }
        return false;
    }

    public function actionDeleteFromMain()
    {
        //Удаление из списка показываемых на главной
        if (Yii::$app->request->post('product_id')) {

            $product_id = Yii::$app->request->post('product_id');
            $product = Product::find()->where('id = :id', [':id' => $product_id])->one();
            $product->show_main = 0;
            $product->save();

            $show_main = Product::find()->select('id, name, category_id, price')->where('show_main = 1')->all();

            $this->layout = false;
            return $this->render('show_main', [
                'show_main' => $show_main,
            ]);
        }
        return false;
    }
}
