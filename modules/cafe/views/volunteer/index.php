<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список волонтёров';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-7 product-index">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success"><?= Yii::$app->session->getFlash('success'); ?></div>
    <?php endif; ?>
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
                <?= Html::a('Добавить волонтёра', ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'name',
                        'label' => 'Имя',
                    ],
                    [
                        'attribute' => 'phone',
                        'label' => 'Номер телефона',
                    ],
                    [
                        'attribute' => 'rating',
                        'label' => 'Рейтинг',
                        'content'=>function($data){
                            $rating = $data->rating;
                            if($rating >= 50)
                            {
                                return "<span class='rating_lvl rating_advanced'>Продвинутый</span>";
                            }
                            elseif ($rating >= 0)
                            {
                                return "<span class='rating_lvl rating_new'>Новичёк</span>";
                            }
                            return "";
                        }
                    ],
                    /*
                    [
                        'attribute'=>'date',
                        'format'=>'text',
                        'content'=>function($data){
                            return '<span data-toggle="tooltip" title="'. date('H:i:s',$data->date) .'">'. date('d-m-Y',$data->date) .'</span>';
                        }
                    ],
                    */

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>