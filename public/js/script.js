$(document).ready(function () {
    $(".ajax-btn").click(function () {
        var id = $(this).data('good-id');

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
                //returnable.qty;
                window.location.reload(true);
            }
        })
    });

    $(".fa-trash-o").click(function () {
        var id = $(this).data('row-id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "http://webshop.loc/cart/item-update",
            data: {id: id, action: 'delete'},
            success: function (del) {
                console.log(id + ' удалилось');
                window.location.reload(true);
            }
        })
    });


    $(".itemCount").bind('keyup change click', function (e) {
        var id = $(this).data('row-id');
        var price = $($($(this).parents('tr')).children('td')[4]).data('item-price');
        console.log("changed to " + $(this).val() + ' for id ' + $(this).parents('tr').data('item-id'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "http://webshop.loc/cart/item-update",
            data: {id: $(this).parents('tr').data('item-id'), count: $(this).val(), action: 'update', price: price},
            success: function (result) {
                console.log(price);
                window.location.reload(true);

            }
        });

    });


    // $("#q").autocomplete({
    //     source: document.location.origin + "/search/autocomplete",
    //     minLength: 3,
    //     select: function (event, ui) {
    //         console.log(ui.item.value);
    //         $('#q').val(ui.item.value);
    //     }
    // }).data("ui-autocomplete")._renderItem = function (ul, item) {
    //     return $("<li></li>")
    //         .data("ui-autocomplete-item", item)
    //         .append('<a href="/product/' + item.id + '">' + item.label + '</a>')
    //         .appendTo(ul);
    // };
});

