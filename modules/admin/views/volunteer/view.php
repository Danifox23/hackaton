<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Url;

use app\models\User;

/* @var $this yii\web\View */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список волонтёров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-md-5 vol-view">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc">Информация о волонтёре</p>
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
                    'name',
                    'email',
                    'phone',
                    'address',
                ],
                'options' => ['class' => 'table table-striped']
            ]) ?>

        </div>
    </div>
</div>

<div class="col-md-5">
    <div class="card">
        <div class="header">
            <h4 class="title">Последняя активность <sup><?= $parts->getCount(); ?></sup></h4>
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
                        'attribute' => 'user_id',
                        'label' => 'Предоставил',
                        'content' => function($data)
                        {
                            return User::findOne($data->user_id)->name;
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
                            return \yii\helpers\Url::to(['product/' . $action, 'id' => $data->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>