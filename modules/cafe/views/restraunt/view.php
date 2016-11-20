<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Url;

use app\models\Part;

/* @var $this yii\web\View */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список ресторанов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-md-7 vol-view">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc">Информация о заведении</p>
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
            <h4 class="title">Последнии пожертвования <sup><?= $positions->getCount(); ?></sup></h4>
            <p class="model-desc"></p>
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
                    [
                        'attribute' => 'date',
                        'format' => 'text',
                        'label' => 'Поступление',
                        'content' => function ($data) {
                            return '<span data-toggle="tooltip" title="' . date('H:i:s', $data->date) . '">' . date('d-m-Y', $data->date) . '</span>';
                        }
                    ],
                    [
                        'label' => 'Статус',
                        'content' => function ($data) {
                            return "<span data-toggle='tooltip' title='" . date('H:i:s',$data->date) ."' class='rating_lvl " . Part::findOne($data->part_id)->status->color . "'>" . Part::findOne($data->part_id)->status->name . "</span>";
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>

<div class="col-md-7 rest-map" data-map="<?= $model->address ?>" data-name="<?= $model->name ?>">
    <div class="card">
        <div class="header">
            <h4 class="title">Местоположение на карте</h4>
            <p class="model-desc">Информация о заведении</p>
        </div>
        <div class="content" id="map" style="height: 500px">
            <script>
                ymaps.ready(init);

                function init(){
                    var address = $('.rest-map').data('map');
                    console.log(name);
                    var myGeocoder = ymaps.geocode(address);
                    myGeocoder.then(
                        function (res) {
                            myMap = new ymaps.Map ("map", {
                                center: res.geoObjects.get(0).geometry.getCoordinates(),
                                zoom: 17
                            });

                            var name = $('.rest-map').data('name');

                            myPlacemark = new ymaps.Placemark(res.geoObjects.get(0).geometry.getCoordinates(), { content: name, balloonContent: address});
                            myMap.geoObjects.add(myPlacemark);

                        },
                        function (err) {
                            alert('Ошибка');
                        }
                    );
                }
            </script>
        </div>
    </div>
</div>