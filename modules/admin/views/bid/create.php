<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Create Order';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-4 bid-index">
    <div class="card">
        <div class="header">
            <h4 class="title">Добавление заявки</h4>
            <p class="model-desc"></p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
            </div>

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput()->label('Название') ?>
            <?= $form->field($model, 'quantity')->textInput(['maxlength' => true])->label('Кол-во') ?>

            <div class="form-group">
                <span href="#" class="btn btn-primary btn-form">Добавить</span>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
