<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Добавление заявки';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-md-6 bid-index">
    <div class="card">
        <div class="header">
            <h4 class="title">Заявки в процессе</h4>
            <p class="model-desc">Список последних заявок, на которые уже откликнулись наши волонтёры</p>
        </div>
        <div class="content">

            <?= GridView::widget([
                'dataProvider' => $checkBid,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute'=>'user_id',
                        'format'=>'text',
                        'label' => 'Отправитель',
                        'content'=>function($data){
                            return $data->user->name;
                        }
                    ],
                    [
                        'attribute'=>'date',
                        'format'=>'text',
                        'label' => 'Дата создания',
                        'content'=>function($data){
                            return '<span data-toggle="tooltip" title="'. date('H:i:s',$data->date) .'">'. date('d-m-Y',$data->date) .'</span>';
                        }
                    ],
                    [
                        'attribute'=>'vol_id',
                        'format'=>'text',
                        'label' => 'Исполнитель',
                        'content'=>function($data){
                            return \app\models\User::findOne($data->vol_id)->name;
                        }
                    ],
                    [
//                        'attribute'=>'spot_id',
                        'format'=>'text',
                        'content'=>function($data){
                            return '<i class="fa fa-map-marker" aria-hidden="true" data-toggle="tooltip" title="'. \app\models\Spot::findOne($data->spot_id)->address .'"></i>';
                        }
                    ],
                    [
                        'attribute'=>'status_id',
                        'format'=>'text',
                        'content'=>function($data){
                            return '<span data-toggle="tooltip" title="'. date('d-m-Y (H:i:s)',$data->date_edit) .'" class="rating_lvl '. $data->status->color .'">'.$data->status->name.'</span>';
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>

<div class="col-md-6 bid-index">
    <div class="card">
        <div class="header">
            <h4 class="title">Заявки без исполнителя</h4>
            <p class="model-desc">Эти заявки пока никто не взял</p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
<!--                --><?//= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $uncheckBid,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute'=>'user_id',
                        'format'=>'text',
                        'label' => 'Отправитель',
                        'content'=>function($data){
                            return $data->user->name;
                        }
                    ],
                    [
                        'attribute'=>'date',
                        'format'=>'text',
                        'label' => 'Дата создания',
                        'content'=>function($data){
                            return '<span data-toggle="tooltip" title="'. date('H:i:s',$data->date) .'">'. date('d-m-Y',$data->date) .'</span>';
                        }
                    ],
                    [
                        'attribute'=>'vol_id',
                        'format'=>'text',
                        'label' => 'Исполнитель',
                        'content'=>function($data){
                            return '-';
                        }
                    ],
                    [
                        'attribute'=>'status_id',
                        'format'=>'text',
                        'content'=>function($data){
                            return '<span data-toggle="tooltip" title="'. date('d-m-Y (H:i:s)',$data->date_edit) .'" class="rating_lvl '. $data->status->color .'">'.$data->status->name.'</span>';
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>