function updateQty(key, qty, product) {
    var data = {
        action: 'cart_action',
        nonce: cart.nonce,
        cart_item_key: key,
        cart_item_qty: qty,
    };
    jQuery(function ($) {
        $.ajax({
            url: cart.url,
            data: data,
            type: 'POST',
            before: updateNumProductInLi(),
            success: function (data) {
                console.log(data);
                jQuery('#cart').html(data);
                updateNumProductInLi();
            },
        });
    });
    if (qty == 0) {
        jQuery('#product-' + product).css('display', 'none');
    }
}

function addCart(product) {
    var data = {
        action: 'cart_action',
        nonce: cart.nonce,
        productid: product,
    };
    jQuery(function ($) {
        $.ajax({
            url: cart.url,
            data: data,
            type: 'POST',
            success: function (data) {
                jQuery('#cart').html(data);
                updateNumProductInLi();
            },
        });
    });
}

function shipping(delivery) {
    if (delivery == 1) {
        jQuery('#Delivery').addClass("active");
        jQuery('#Collection').removeClass("active");

    }else{
        jQuery('#Collection').addClass("active");
        jQuery('#Delivery').removeClass("active");
    }

    jQuery(function ($) {
        $.ajax({
            url: cart.url,
            data: data,
            type: 'POST',
            success: function (data) {
                jQuery('#cart').html(data);
                updateNumProductInLi();
            },
        });
    });
}