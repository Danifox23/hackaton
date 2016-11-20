<?php

use yii\helpers\Url;

?>

<div class="test">

</div>

<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">

        <div class="card col-md-12 period-picker">
            <div class="content">
                <p>Показать результаты за:
                    <span class="active-interval" data-period="all"> всё время</span> |
                    <span data-period="year">год</span> |
                    <span data-period="month">месяц</span> |
                    <span data-period="week">неделя</span> |
                    <span data-period="day">день</span>
                </p>
            </div>
        </div>

        <div class="period_ajax">
            <div class="col-lg-3 col-sm-6 period_info">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-left">
                                    <i class="fa fa-cubes" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Пожертвований</p>
                                    <span><?= count($products) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="card-link">
                                <i class="fa fa-external-link" aria-hidden="true"></i><a
                                    href="<?= Url::to(['bid/']) ?>"
                                    class="text-muted-low">Перейти в
                                    заказы</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 period_info">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-left">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Выполненных заявок</p>
                                    <span><?= count($complete) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="card-link">
                                <i class="fa fa-external-link" aria-hidden="true"></i><a
                                    href="<?= Url::to(['bid/']) ?>"
                                    class="text-muted-low">Перейти в
                                    заявки</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 period_info">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-left">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Волонтёров</p>
                                    <span><?= count($vol) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="card-link">
                                <i class="fa fa-external-link" aria-hidden="true"></i><a
                                    href="<?= Url::to(['volunteer/']) ?>"
                                    class="text-muted-low">Перейти в
                                    волонтёры</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 period_info">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-warning text-left">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Заведения</p>
                                    <span><?= count($rest) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="card-link">
                                <i class="fa fa-external-link" aria-hidden="true"></i><a
                                    href="<?= Url::to(['restraunt/']) ?>"
                                    class="text-muted-low">Перейти в
                                    заведения</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 spots">
        <div class="card">
            <div class="header">
                <h4 class="title">Пункты выдачи</h4>
                <p class="model-desc">Пункты, где находятся ваши продукты</p>
            </div>
            <div class="content">
                <?php if(count($spots)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Адрес</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($spots as $spot): ?>
                            <tr>
                                <td><?= $spot->id ?></td>
                                <td><a href="<?= Url::to(['spot/view/', 'id' => $spot->id]) ?>"><?= $spot->address ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <h5>Пунктов пока нет</h5>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>