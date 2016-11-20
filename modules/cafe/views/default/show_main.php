<?php
use yii\helpers\Url;
?>

<div class="card">
    <div class="header">
        <h4 class="title">Пункты выдачи</h4>
        <p class="model-desc">Пункты, где можно получить помощь</p>
    </div>
    <div class="content">
        <?php if(count($spots)): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Адрес</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($spots as $spot): ?>
                    <tr>
                        <td><?= $spot->id ?></td>
                        <td><a href="<?= Url::to(['spot/view/', 'id' => $spot->id]) ?>"><?= $spot->address ?></a></td>
                        <td data-spot-id="<?= $spot->id ?>" class="table-actions delete-from-main">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <h5>Пунктов пока нет</h5>
        <?php endif; ?>
    </div>
</div>
