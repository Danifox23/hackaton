<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = 'Добавление пункта';
$this->params['breadcrumbs'][] = ['label' => 'Пункты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-4 spot-create">
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