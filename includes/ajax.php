<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function mode_theme_update_mini_cart() {
	$productid = filter_var( $_POST['productid'], FILTER_SANITIZE_STRING );
	if ($productid){
		WC()->cart->add_to_cart($productid);
		echo theoak_woocommerce_shop_cart();
		wp_die();
	}
	$cart_item_key = filter_var( $_POST['cart_item_key'], FILTER_SANITIZE_STRING );
	$quantity = filter_var( $_POST['cart_item_qty'], FILTER_SANITIZE_STRING );
	if ($quantity != 0){
		WC()->cart->set_quantity( $cart_item_key, $quantity );
		echo theoak_woocommerce_shop_cart();
		wp_die();
	}else{
		WC()->cart->remove_cart_item($cart_item_key);
		echo theoak_woocommerce_shop_cart();
		wp_die();
	}
}

add_filter( 'wp_ajax_nopriv_cart_action', 'mode_theme_update_mini_cart' );
add_filter( 'wp_ajax_cart_action', 'mode_theme_update_mini_cart' );