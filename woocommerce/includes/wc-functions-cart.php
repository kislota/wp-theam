<?php

if ( ! function_exists( 'theoak_woocommerce_cart_link_fragment' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'theoak_woocommerce_cart_link_fragment' );
	function theoak_woocommerce_cart_link_fragment( $fragments ) {

		ob_start();
		theoak_woocommerce_cart_subtotal();

		$fragments['div.sub_total_discount'] = ob_get_clean();

		ob_start();
		theoak_woocommerce_cart_total();

		$fragments['div.grand_total'] = ob_get_clean();

		ob_start();
		theoak_woocommerce_cart_total();

		$fragments['div.grand_total'] = ob_get_clean();

		ob_start();

		$fragments['li.woocommerce-mini-cart-item'] = ob_get_clean();

		ob_start();

		theoak_woocommerce_cart_product();

		$fragments['div.inner_scrolling_div'] = ob_get_clean();

		return $fragments;
	}
}


function theoak_woocommerce_cart_product() {

	$tpl_dir = get_template_directory_uri() . '/assets';
	echo "<div class='inner_scrolling_div' style='opacity: 1;'>";
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		if ( $cart_item['variation_id'] ) {
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['variation_id'], $cart_item, $cart_item_key );
			$parent_id  = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			$cat        = get_the_terms( $parent_id, 'product_cat' );
		} else {
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			$cat        = get_the_terms( $product_id, 'product_cat' );
		}
		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
			$image         = wp_get_attachment_url( $_product->get_image_id() );
			$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
		}
		?>
        <div class="product_single_item">
            <div class="left_info">
                <div class="left_top"><img src="<?php echo $image ?>" alt="" width="40"></div>
                <div class="left_bottom">
                    <ul>
                        <li class="less">
                            <a onClick="updateQty('<?php echo $cart_item_key; ?>',
							<?php echo $cart_item['quantity'] - 1; ?>,
                            <?php echo $product_id; ?>)"
                               data-product_id="<?php echo $product_id;?>"
                               data-count="<?php echo $cart_item['quantity']; ?>">
                                <img src="<?php echo $tpl_dir; ?>/images/icon_less_white.svg" alt="Less">
                            </a>
                        </li>
                        <li class="add">
                            <a onClick="updateQty('<?php echo $cart_item_key; ?>',
	                        <?php echo $cart_item['quantity'] + 1; ?>,
	                        <?php echo $product_id; ?>)"
                               data-product_id="<?php echo $product_id;?>"
                               data-count="<?php echo $cart_item['quantity']; ?>">
                                <img src="<?php echo $tpl_dir; ?>/images/icon_add_white.svg" alt="Add">
                            </a>
                    </ul>
                </div>
            </div>
            <div class="right_info">
                <div class="right_top"><h4><?php echo $product_name; ?></h4>
                    <p class="busket_cat"><span class="ng-binding"><?php echo $cat['0']->name; ?></span>
                    </p></div>
                <div class="right_bottom">
                    <ul>
                        <li class="item_quantity ng-binding"><?php echo $cart_item['quantity']; ?> item x</li>
                        <li class="price ng-binding"><?php echo $product_price; ?></li>
                    </ul>
                </div>
            </div>
        </div>
		<?php
	}
	echo '</div>';

}

function theoak_woocommerce_cart_subtotal() {
	?>
    <div class="sub_total_discount">
        <ul>
            <li>
                <span class="subtotal">Subtotal</span>
                <span id="subtotal" class="item_price"><?php wc_cart_totals_subtotal_html(); ?></span>
            </li>
            <li>
                <span class="subtotal">Discount</span>
                <span id="discount" class="item_price">£ 0.00</span>
            </li>
            <li>
                <span class="subtotal">Delivery</span>
                <span id="deliveryType" class="item_price">£ 1.00</span>
            </li>
        </ul>
    </div>

	<?php
}

function theoak_woocommerce_cart_total() {
	?>
    <div class="grand_total order_now_section">
        <div class="total">
            <p>Total <span id="total"><?php wc_cart_totals_order_total_html(); ?></span></p>
        </div>
    </div>
	<?php
}


if ( ! function_exists( 'theoak_woocommerce_shop_cart' ) ) {

	function theoak_woocommerce_shop_cart() {
		?>
        <div class="inner_scrolling_div" tabindex="3" style="outline: none;">
			<?php
			//				$instance = array(
			//					'title' => '',
			//				);
			//				the_widget( 'WC_Widget_Cart', $instance );
			theoak_woocommerce_cart_product();
			?>
        </div>
        <div class="sub_total_discount">
            <ul>
                <li>
                    <span class="subtotal">Subtotal</span>
                    <span id="subtotal" class="item_price"><?php wc_cart_totals_subtotal_html(); ?></span>
                </li>
                <li>
                    <span class="subtotal">Discount</span>
                    <span id="discount" class="item_price">£ 0.00</span>
                </li>
                <li>
                    <span class="subtotal">Delivery</span>
                    <span id="deliveryType" class="item_price">£ 1.00</span>
                </li>
            </ul>
        </div>
        <div class="grand_total order_now_section">
            <div class="total">
                <p>Total <span id="total"><?php wc_cart_totals_order_total_html(); ?></span></p>
            </div>
        </div>
        <div class="single_item busket_radio">
            <ul>
                <?php

                foreach( WC()->session->get('shipping_for_package_0')['rates'] as $rate_id =>$rate) {
	                var_dump($rate->method_id);
//                    if ( $rate->method_id == 'flat_rate' ) {
//		                $default_rate_id = array( $rate_id );
//		                break;
//	                }
                }
//                if ($default_rate_id)
//                    WC()->session->set('chosen_shipping_methods', $default_rate_id );
//                var_dump($default_rate_id);

                $available_methods = WC()->shipping->packages[0]['rates'];
//                $chosen_method = key($available_methods);
//                WC()->session->set( 'chosen_shipping_methods', $chosen_method );
                $chosen_method = WC()->session->get( 'chosen_shipping_methods');
                var_dump($chosen_method);
                $index = 0;
                ?>
            <?php foreach ( $available_methods as $method ) : ?>
                <li>
			        <?php
			        printf( '<input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />
								<label for="shipping_method_%1$d_%2$s">%5$s</label>',
				        $index++, sanitize_title( $method->id ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ), wc_cart_totals_shipping_method_label( $method ) );
			        ?>
                </li>
	        <?php endforeach; ?>
                </ul>
                <ul>
                <li id="Delivery" class="active">
                    <input onClick="javascript: shipping(1);" type="radio" checked id="option" name="address" value="1">
                    <label for="option"> <span></span> Delivery </label>
                </li>
                <li id="Collection" class="">
                    <input onClick="javascript: shipping(0);" type="radio" id="option" name="address" value="0">
                    <label for="option"> <span></span> Collection </label>
                </li>
            </ul>
        </div>
        <div class="order_now_section">
            <div class="total">
                <a type="button" href="/checkout" class="order_now_button btn btn-primary "
                   style="min-width: 94px; width: auto;">
                    <span ng-hide="btnLoading">Order Now</span>
                </a>
            </div>
        </div>
		<?php
	}
}


