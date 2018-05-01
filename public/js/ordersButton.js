$(document).ready(function () {
    $('.btn-number').click(function (e) {
        e.preventDefault();

        var type = $(this).data('action'),
            input = $($(this).parents('.input-group')).children('input'),
            oldVal = input.val(),
            token = $(this).data('token'),
            ogid = $(this).data('ogid');

        if (type == 'minus') {
            input.val(--oldVal).change();
        } else if (type == 'plus') {
            input.val(++oldVal).change();
        } else {
            input.val(0);
        }

        $.ajax({
            type: "POST",
            url: document.location.origin + "/admin/order/product-action",
            data: {ogid: ogid, oldVal: oldVal, action: 'update', '_token': token},
            success: function (response) {
                // window.location.reload(true);

                console.log(response.success);
                console.log(response.msg);
            },
            error: function () {
                console.log("ошибка");
            }
        })
    });


    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });


    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    $('.btn-delete').click(function () {
        var token = $(this).data('token'),
            type = $(this).data('type'),
            ogid = $(this).data('ogid');

        if (confirm('Удалить?')) {
            $.ajax({
                type: "POST",
                url: document.location.origin + "/admin/order/product-action",
                data: {ogid: ogid, action: 'delete', '_token': token},
                success: function (response) {
                    window.location.reload(true);
                    console.log(response.success);
                    console.log(response.msg);
                },
                error: function () {
                    console.log("ошибка");
                }
            });
        }
    });

    // AJAX удалить картинку из товара в админ панели
    $('.close').click(
        function () {
            var imgId = $(this).data('img-id'),
                token = $(this).data('token');
            console.log("клик по Id" + imgId);

            if (confirm('Удалить картинку?')) {
                $.ajax({
                    type: "POST",
                    url: document.location.origin + "/admin/product/delete-img",
                    data: {imgId: imgId, '_token': token},
                    success: function () {
                        console.log("удалило");
                        $('#Image1').remove();
                    },
                    error: function () {
                        console.log("ошибка");
                    }
                });
            }
        }
    );


});