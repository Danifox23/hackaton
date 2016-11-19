<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пункты выдачи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-4 status-index">
    <div class="card">
        <div class="header">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
            <p class="model-desc">Доступные пункты выдачи</p>
        </div>
        <div class="content">
            <div class="model-action-buttons">
                <?= Html::a('Добавить пункт', ['create'], ['class' => 'btn btn-success']) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                        'attribute'=>'address',
                        'label'=>'Адрес',
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>

<div class="col-md-8 spot-view">
    <div class="card">
        <div class="header">
            <h4 class="title">Местоположение</h4>
            <p class="model-desc"></p>
        </div>
        <div class="content" id="map" style="height: 500px">
            <script>
                ymaps.ready(init);

                function init() {
                    var MultiGeocoder = require('multi-geocoder'),
                        geocoder = new MultiGeocoder({provider: 'yandex', coordorder: 'latlong'}),
                        // Получаем экземпляр провайдера.
                        provider = geocoder.getProvider();

// Переопределяем метод getText(), извлекающий из переданного массива адреса,
// которые требуется геокодировать.
                    provider.getText = function (point) {
                        var text = 'Москва, ' + point.address;
                        console.log(text);
                        return text;
                    };
                    geocoder.geocode([
                        {
                            "address": "1905 года ул., д.19",
                            "name": "Старый лекарь",
                            "phone": "8-499-253-52-61"
                        }, {
                            "address": "1-ая Квесисская ул., д 18",
                            "name": "А5 №2",
                            "phone": "8-495-614-04-67"
                        }, {
                            "address": "1-й Тверской-Ямской пер, д.16",
                            "name": "Самсон Фарма №9",
                            "phone": "8-495-251-22-27"
                        }
                    ])
                        .then(function (res) {
                            console.log(res);
                        });
                }
            </script>
        </div>
    </div>
</div>