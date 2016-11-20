<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Status;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\Spot;

/* @var $this yii\web\View */
/* @var $model app\models\Part */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->where(['role_id' => 3])->all(), 'id', 'name'), ['prompt' => 'Выберите заведение'])->label('Заведение') ?>

    <?= $form->field($model, 'vol_id')->dropDownList(ArrayHelper::map(User::find()->where(['role_id' => 2])->all(), 'id', 'name'), ['prompt' => 'Выберите заведение'])->label('Исполнитель') ?>

    <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'name'), ['prompt' => 'Выберите статус'])->label('Статус') ?>

    <?= $form->field($model, 'spot_id')->dropDownList(ArrayHelper::map(Spot::find()->all(), 'id', 'address'), ['prompt' => 'Выберите пункт'])->label('Пункт доставки') ?>

    <!--    --><? //= $form->field($model, 'date')->textInput() ?>

    <!--    --><? //= $form->field($model, 'date_edit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
