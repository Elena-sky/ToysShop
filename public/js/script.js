$(document).ready(function () {

    //AJAX добавление товара в корзину
    $(".ajax-btn").click(function () {
        var id = $(this).data('good-id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: document.location.origin + "/cart/item-add",
            data: {id: id},
            success: function (returnable) {
                console.log(returnable);
                console.log(id + ' was successfully added!');
                //returnable.qty;
                window.location.reload(true);
            }
        })
    });

    // AJAX удаление товара из корзины
    $(".fa-trash-o").click(function () {
        var id = $(this).data('row-id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: document.location.origin + '/cart/item-delete',
            data: {id: id, _method: 'delete'},
            success: function (del) {
                console.log(id + ' удалилось');
                window.location.reload(true);
            }
        })
    });

    // AJAX редактирование колличесива товара в корзине и цену
    $(".itemCount").bind('keyup change click', function (e) {
        var id = $(this).data('row-id');
        var price = $($($(this).parents('tr')).children('td')[4]).data('item-price');
        console.log("changed to " + $(this).val() + ' for id ' + $(this).parents('tr').data('item-id'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: document.location.origin + "/cart/item-update",
            data: {id: $(this).parents('tr').data('item-id'), count: $(this).val(), _method: 'put', price: price},
            success: function (result) {
                console.log(price);
                window.location.reload(true);

            }
        });

    });

    // Поиск по названию в товаре
    $("#q").autocomplete({
        source: document.location.origin + "/search/autocomplete",
        minLength: 3,
        select: function (event, ui) {
            console.log(ui.item.value);
            $('#q').val(ui.item.value);
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        return $("<li></li>")
            .data("ui-autocomplete-item", item)
            .append('<a href="/product/' + item.id + '">' + item.label + '</a>')
            .appendTo(ul);
    };

// AJAX контактная форма
    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }

    // AJAX контактная форма
    $('#contactform').on('submit', function (e) {
        e.preventDefault();
        var form = $('#contactform');
        var data = getFormData(form);
        console.log(data);

        $.ajax({
            type: 'POST',
            url: document.location.origin + '/contact/sendmail',
            data: data,
            success: function (result) {
                $('#sendmessage').show();
                $('#sendmessage').append('<div class="close">☓</div>');
                $('#sendmessage').fadeIn('slow');
                $('#sendmessage').css('top', ($(window).height() - $('#sendmessage').outerHeight()) / 2 + 'px');
                $('#sendmessage').css('left', ($(window).width() - $('#sendmessage').outerWidth()) / 2 + 'px');
                function windowClose() {
                    $('#sendmessage').fadeOut('slow');
                };
                setTimeout(function () {
                    windowClose()
                }, 4000);
                $('.close').click(function () {
                    windowClose();
                });
            },
            error: function () {
                $('#senderror').show();
                $('#senderror').append('<div class="close">☓</div>');
                $('#senderror').fadeIn('slow');
                $('#senderror').css('top', ($(window).height() - $('#senderror').outerHeight()) / 2 + 'px');
                $('#senderror').css('left', ($(window).width() - $('#senderror').outerWidth()) / 2 + 'px');
                function windowClose() {
                    $('#senderror').fadeOut('slow');
                };
                setTimeout(function () {
                    windowClose()
                }, 4000);
                $('.close').click(function () {
                    windowClose();
                });
            }
        });
    });


});

