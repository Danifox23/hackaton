<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Part;

/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = $model->address;
$this->params['breadcrumbs'][] = ['label' => 'Пункты выдачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-4 spot-view">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
                <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'address',
                ],

                'options' => ['class' => 'table table-striped']
            ]) ?>

        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="card">
        <div class="header">
            <h4 class="title">Партии в этом пункте <sup><?= $parts->getCount(); ?></sup></h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">

            <?= GridView::widget([
                'dataProvider' => $parts,
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
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                        'template' => '{view} {update} {delete}{link}',
                        'urlCreator' => function ($action, $data) {
                            return \yii\helpers\Url::to(['bid/' . $action, 'id' => $data->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>