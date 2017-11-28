$(document).ready(function () {
    $(".ajax-btn").click(function () {
        var id = $(this).data('good-id'),
            cartPrice = parseFloat($(".total").html()),
            cartEl = $(".total"),
            cartCount = parseFloat($(".count").html()),
            countEl = $(".count");


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "http://webshop.loc/cart/item-update",
            data: {id: id, action: 'add'},
            success: function (returnable) {
                console.log(returnable);
                console.log(id + ' was successfully added!');
                var resPrice = returnable.price + cartPrice;
                //returnable.qty;
                cartEl.text(resPrice + ' грн.');
                countEl.text(++cartCount);
            }
        })
    });

    $(".ajax-btn-remove").click(function () {
        var id = $(this).data('row-id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "http://webshop.loc/cart/item-update",
            data: {id: id, action: 'delete'},
            success: function (del) {
                console.log(id + ' правильное');
                window.location.reload(true);
                //do
                // var resDel = del.id;
                // return resDel;
            }
        })
    });


    $(".itemCount").bind('keyup change click', function (e) {
        if (!$(this).data("previousValue") || $(this).data("previousValue") != $(this).val()) {
            console.log("changed to " + $(this).val() + ' for id ' + $(this).parents('tr').data('item-id'));
            $(this).data("previousValue", $(this).val());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "http://webshop.loc/cart/item-update",
                data: {id: $(this).parents('tr').data('item-id'), count: $(this).val(), action: 'update'},
                success: function (del) {
                    console.log(id + ' правильное');
                    window.location.reload(true);
                    //do
                    // var resDel = del.id;
                    // return resDel;
                }
            })
        }

    });


    $(".itemCount").each(function () {
        $(this).data("previousValue", $(this).val());
    });
});

