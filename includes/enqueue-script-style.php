<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'wp_enqueue_scripts', 'theoak_styles' );
function theoak_styles() {
	wp_enqueue_style( 'theoak-style-global', get_stylesheet_uri(), array( 'bootsrap-style' ) );
	wp_enqueue_style( 'theoak-style', get_template_directory_uri() . '/assets/css/style.css', array( 'theoak-style-global' ), null, 'all' );
	wp_enqueue_style( 'bootsrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null, 'all' );
	wp_enqueue_style( 'loading', get_template_directory_uri() . '/assets/css/loading.css', array(), null, 'all' );
	wp_enqueue_style( 'owLcarousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), null, 'all' );
	wp_enqueue_style( 'owLtheme', get_template_directory_uri() . '/assets/css/owl.theme.css', array(), null, 'all' );
	wp_enqueue_style( 'payment', get_template_directory_uri() . '/assets/css/payment.css', array(), null, 'all' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), null, 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), null, 'all' );


}

add_action( 'wp_enqueue_scripts', 'theoak_scripts' );
function theoak_scripts() {

	wp_enqueue_script( 'theoak-cart', get_template_directory_uri() . '/assets/js/cart.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'theoak-product', get_template_directory_uri() . '/assets/js/num_product.js', array( ), null, false );
	wp_localize_script( 'theoak-cart', 'cart', array(
		'url'   => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'cart-nonce' )
	) );
	wp_localize_script( 'theoak-product', 'product', array(
		'url'   => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'product-nonce' )
	) );

}
