<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$tpl_dir = get_template_directory_uri() . '/assets';

$catName = [];

$category_name = single_cat_title( '', false );


$taxonomy       = 'product_cat';
$orderby        = 'name';
$show_count     = 0;
$pad_counts     = 0;
$hierarchical   = 1;
$title          = '';
$empty          = 0;
$args           = array(
	'taxonomy'     => $taxonomy,
	'orderby'      => $orderby,
	'show_count'   => $show_count,
	'pad_counts'   => $pad_counts,
	'hierarchical' => $hierarchical,
	'title_li'     => $title,
	'hide_empty'   => $empty
);
$all_categories = get_categories( $args );
get_header();

$product_id      = 282;
$product_cart_id = WC()->cart->generate_cart_id( $product_id );
$in_cart         = WC()->cart->find_product_in_cart( $product_cart_id );

if ( $in_cart ) {

	$notice = 'Product ID ' . $product_id . ' is in the Cart!';
	wc_print_notice( $notice, 'notice' );

}

do_action( 'woocommerce_before_main_content' );

?>
    <div class="col-lg-3 col-md-3 col-sm-4 copy_content_height"">
    <div class="left_sidebar scroll_parent" style="margin-top: 10px;">
        <h2 class="course_title">Categories <span>Items</span></h2>
        <div class="main_courses">
            <ul>
				<?php foreach ( $all_categories as $key => $cat ): ?>
					<?php if ( $cat->count != 0 ): ?>
						<?php $catName[] = $cat->name; ?>
						<?php $category_id = $cat->term_id; ?>
                        <li <?php echo ( $category_name == $cat->name ) ? "class='active'" : "class=''" ?>>
							<?php echo '<a href="' . get_term_link( $cat->slug, 'product_cat' ) . '" class="ng-binding">' . $cat->name . '<span class="badge"></span></a>'; ?>
                        </li>
					<?php endif; ?>
				<?php endforeach; ?>
            </ul>
        </div>
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-8 content_height">
        <div class="middle_content">

			<?php if ( $category_name != null ) : ?>
				<?php $category = $category_name; ?>
                <h2 id="category_title" class="order_title"><?php woocommerce_page_title(); ?> <span> Items</span></h2>
			<?php else: ?>
				<?php $category = $catName['0']; ?>
                <h2 id="category_title" class="order_title"><?php echo $catName['0']; ?> <span> Items</span></h2>
			<?php endif; ?>
			<?php
			$map_legacy  = array(
				'category' => $category,
			);
			$productInfo = wc_get_products( $map_legacy );
			?>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
					<?php foreach ( $productInfo as $product ): ?>
                        <div class="single_product">
                            <div class="left_column">
                                <div class="product_image">
                                    <img src="<?php echo $tpl_dir; ?>/images/product1.jpg" alt="" width="50">
                                </div>
                                <div class="product_title">
                                    <h2><span><?php echo $product->sku ?></span> <?php echo $product->name ?></h2>
                                </div>
                                <div class="product_description">
                                    <p><?php echo $product->description ?></p>
                                </div>
                            </div>

							<?php
							if ( $product->is_type( 'variable' ) ):
								$current_product = new  WC_Product_Variable( $product->id );
								$variations = $current_product->get_available_variations();
								?>
                                <div class="right_column">
                                    <ul class="content_right_colum_list">
										<?php foreach ( $variations as $variable ): ?>
                                            <div id="add">
                                                <a onClick="addCart(<?php echo $variable['variation_id']; ?>)">
                                                    <li class="col-xs-8 col-sm-8">
                                                        <span id="product-<?php echo $variable['variation_id']; ?>"
                                                              class="number" style="display: none"></span>
                                                        <span class="item_name">
                                                            <?php $att = 'attribute_' . key( $product->attributes );
                                                            echo $variable['attributes'][ $att ]; ?>
                                                        </span>
                                                        <span>£ <?php echo $variable['display_price'] ?>
                                                            <img class="plus"
                                                                 src="<?php echo $tpl_dir; ?>/images/plus.png" alt="">
                                                        </span>

                                                    </li>
                                                </a>
                                                <span class="removeBtn">
                                                <img class="plus" src="<?php echo $tpl_dir; ?>/images/minus.png" alt="">
                                            </span>
                                            </div>

										<?php endforeach; ?>
                                    </ul>
                                </div>
							<?php else: ?>
                                <div class="right_column">
                                    <ul class="content_right_colum_list">
                                        <div>
                                            <a onClick="addCart(<?php echo $product->id; ?>)">
                                                <li class="item_name_none col-xs-8 col-sm-8">
                                                            <span id="product-<?php echo $product->id; ?>"
                                                                  class="number" style="display: none"></span>
                                                    <span>£ <?php echo $product->price; ?>
                                                        <img class="plus" src="<?php echo $tpl_dir; ?>/images/plus.png"
                                                             alt="">
                                        </span>
                                                </li>
                                            </a>
                                            <span class="removeBtn">
                                                <img class="plus" src="<?php echo $tpl_dir; ?>/images/minus.png" alt="">
                                            </span>
                                        </div>
                                    </ul>
                                </div>
							<?php endif; ?>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!--
	----------------------------------------------Cart----------------------------------------------
	-->
<?php do_shortcode( '[woocommerce_checkout]' ); ?>
    <div class="col-lg-3 col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-6 copy_content_height">
        <div class="right_sidebar scroll_parent" style="margin-top: 0px;">
            <!-- ngIf: !$root.isNotMobile && showBasket -->
            <div class="order_box">
                <h2 class="order_box_title">
                    <span class="your_order">Your Order </span>
                    <span class="cart_icon">
                        <img src="<?php echo $tpl_dir; ?>/images/icon_cart_light_gray.svg">
                    </span>
                </h2>
                <form id="cart" action="" class="ng-pristine ng-valid">
					<?php theoak_woocommerce_shop_cart(); ?>
                </form>
            </div>
            <div class="payment_enable">
                <img class="mastercard_color" src="<?php echo $tpl_dir; ?>/images/icon_mastercard.svg" alt="Mastercard">
                <img class="visa_color" src="<?php echo $tpl_dir; ?>/images/icon_visa.svg" alt="Visa">
                <img class="visa_color" src="<?php echo $tpl_dir; ?>/images/payment/american-express.png"
                     alt="American Express">
            </div>
        </div>
    </div>
<?php

get_footer( 'shop' );
