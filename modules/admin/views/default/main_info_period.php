<?php

use yii\helpers\Url;

?>

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