<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Part;

/* @var $this yii\web\View */
/* @var $model app\models\Part */

$this->title = 'Заявка';
$this->params['breadcrumbs'][] = ['label' => 'Список заявок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-4 order-view">
    <div class="card">
        <div class="header">
            <h4 class="title">Заявка №<?= Html::encode($model->id) ?></h4>
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
                    [
                        'attribute'=>'user_id',
                        'format'=>'raw',
                        'label' => 'Заведение',
                        'value'=> $model->user->name,
                    ],
                    [
                        'attribute'=>'vol_id',
                        'format'=>'raw',
                        'label' => 'Исполнитель',
                        'value'=> \app\models\User::findOne($model->vol_id)->name,
                    ],
                    [
                        'attribute'=>'date',
                        'format'=>'text',
                        'value'=> date('d-m-Y (H:i:s)',$model->date),
                    ],
                    [
                        'attribute'=>'date_edit',
                        'format'=>'raw',
                        'value'=> date('d-m-Y (H:i:s)',$model->date_edit),
                    ],
                    [
                        'attribute'=>'spot_id',
                        'format'=>'text',
                        'value'=> \app\models\Spot::findOne($model->spot_id)->address,
                    ],
                    [
                        'attribute'=>'status_id',
                        'format'=>'raw',
                        'value'=> '<span class="rating_lvl '. $model->status->color .'">'.$model->status->name.'</span>',
                    ],
                ],
                'options' => ['class' => 'table table-striped']
            ]) ?>

        </div>
    </div>
</div>

<div class="col-md-4 ">
    <div class="card">
        <div class="header">
            <h4 class="title">Продукты в заявке <sup></sup></h4>
            <p class="model-desc"> позиций</p>
        </div>
        <div class="content">
            <?= GridView::widget([
                'dataProvider' => $positions,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute' => 'name',
                        'label' => 'Наименование',
                    ],
                    [
                        'attribute' => 'quantity',
                        'label' => 'Кол-во',
                        'content' => function ($data) {
                            return $data->quantity . 'шт.';
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>