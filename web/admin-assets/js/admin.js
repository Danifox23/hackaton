$('.period-picker span').bind('click', function () {
    // $('.period_info').addClass('animated flipOutX');
    $period = $(this).data('period');
    $('.period-picker span.active-interval').removeClass('active-interval');
    $(this).addClass('active-interval');

    $.ajax({
        type: "POST",
        url: "/web/admin/default/period",
        data:
        {
            "period": $period
        },
        cache: false,

        success: function (response) {
            if (!response) {
                $.notify({
                    title: '<strong>Ошибка</strong><br>',
                    message: "норм, но ответ пустой"
                }, {
                    type: 'warning'
                });
            }
            else {
                $.notify({
                    title: '<strong>Готово</strong><br>',
                    message: "Результаты отфильтрованы!"
                }, {
                    type: 'success',
                    delay: 100,
                    timer: 500
                });

                $('.period_ajax').html(response);
                $('.period_info').addClass('animated flip');
            }
        },
        error: function (response) {
            $.notify({
                title: '<strong>Ошибка</strong><br>',
                message: "Может тебе стоит прекратить заниматься программированием?"
            }, {
                type: 'danger'
            });
        }
    });
});


// $('.delete-from-main').bind('click', function () {
$(document).on('click', '.delete-from-main', function () {
    // $('.products-on-main .content').html('<i class="fa fa-circle-o-notch fa-spin fa-fw center-block"></i>');
    $spot_id = $(this).data('spot-id');

    $.ajax({
        type: "POST",
        url: "/web/admin/default/delete-spot",
        data:
        {
            "spot_id": $spot_id
        },
        cache: false,

        success: function (response) {
            if (!response) {
                $.notify({
                    title: '<strong>Ошибка</strong><br>',
                    message: "Пришёл пустой либо ложный ответ"
                }, {
                    type: 'warning',
                    delay: 100,
                    timer: 500
                });
            }
            else {
                $.notify({
                    title: '<strong>Готово</strong><br>',
                    message: "Выбранный пункт успешно удалён!"
                }, {
                    type: 'success',
                    delay: 100,
                    timer: 500
                });
                $('.spots').html(response);
            }
        },
        error: function (response) {
            $.notify({
                title: '<strong>Ошибка</strong><br>',
                message: "Ошибка сервера!"
            }, {
                type: 'danger',
                delay: 100,
                timer: 500
            });
        }
    });
});

$('[data-toggle="tooltip"]').tooltip();
