<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Заказ № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Заявка '.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать заявку';
?>

<div class="col-md-4 category-view">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>
