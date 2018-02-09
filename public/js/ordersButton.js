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
            url: "http://webshop.loc/admin/order/product-action",
            data: {ogid: ogid, oldVal: oldVal, action: 'update', '_token': token},
            success: function (response) {
                window.location.reload(true);

                console.log(response.success);
                console.log(response.msg);
            }
        })
    });
    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });
    /*$('.input-number').change(function () {

        var minValue = parseInt($(this).attr('min'));
        var maxValue = parseInt($(this).attr('max'));
        if (!minValue) minValue = 1;
        if (!maxValue) maxValue = 9999999999999;
        var valueCurrent = parseInt($(this).val());

        var name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


     });*/
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

        $.ajax({
            type: "POST",
            url: "http://webshop.loc/admin/order/product-action",
            data: {ogid: ogid, action: 'delete', '_token': token},
            success: function (response) {
                window.location.reload(true);
                console.log(response.success);
                console.log(response.msg);
            }

        })
    });

    // admin/productUpdate/delete image
    // $('.content.clossable').hover(function () {
    //         $(this).find('.close').animate({opacity: 1}, 100)
    //     }, function () {
    //         $(this).find('.close').animate({opacity: 0}, 100)
    //     }
    // );
    $('.close').click(function () {
            var imgId = $(this).data('img-id'),
                token = $(this).data('token');
            console.log("клик по Id" + imgId);
            $.ajax({
                type: "POST",
                url: "http://webshop.loc/admin/product/delete-img",
                data: {imgId: imgId, '_token': token},
                success: function () {
                    console.log("удалило");
                    $('#Image1').remove();

                    // $(this).offsetParent().hide();
                },
                error: function () {
                    console.log("ошибка");

                }
            })

        }
    );


});