function updateNumProductInLi ()
{
    var products = jQuery('.add a');

    jQuery(products).each(function (i, el) {
        var prodId = jQuery(el).data('product_id');
        var count = jQuery(el).data('count');

        jQuery('#product-'+prodId).css('display','initial');
        jQuery('#product-'+prodId).text(count);
    })
}
