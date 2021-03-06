<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*
 * Wrappers single product
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'theoak_add_breadcrumbs', 20 );
function theoak_add_breadcrumbs(){
	?>
	<div class="breadcrumb_dress">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>
	<?php
}

add_action( 'woocommerce_before_single_product', 'theoak_wrapper_product_start', 5 );
function theoak_wrapper_product_start() {
	?>
	<div class="single-section">
	<div class="container">
	<?php
}
add_action( 'woocommerce_after_single_product', 'theoak_wrapper_product_end', 5 );
function theoak_wrapper_product_end() {
	?>
	</div>
	</div>
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'theoak_wrapper_product_image_start', 5 );
function theoak_wrapper_product_image_start() {
	?>
	<div class="col-md-4 single-left">
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'theoak_wrapper_product_image_end', 25 );
function theoak_wrapper_product_image_end() {
	?>
	</div>
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'theoak_wrapper_product_entry_start', 30 );
function theoak_wrapper_product_entry_start() {
	?>
	<div class="col-md-8 single-right">
	<?php
}
add_action( 'woocommerce_after_single_product_summary', 'theoak_wrapper_product_entry_end', 5 );
function theoak_wrapper_product_entry_end() {
	?>
	</div>
	<div class="clearfix"> </div>
	<?php
}

/*
 * Tabs single product
 */
add_filter( 'woocommerce_short_description', 'theoak_short_description', 10 );
function theoak_short_description($content){
	?>
	<div class="description">
		<?php echo $content;?>
	</div>
	<?php
}

add_filter( 'woocommerce_product_tabs', 'theoak_product_tabs_filter', 100 );
function theoak_product_tabs_filter( $tabs ) {
	if ( ! empty( $tabs ) ) : ?>
		
		<div class="woocommerce-tabs wc-tabs-wrapper additional_info">
			<div class="container">
				<div class="sap_tabs">
					<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
						<ul class="tabs wc-tabs" role="tablist">
							<?php foreach ( $tabs as $key => $tab ) : ?>
								<li class="<?php echo esc_attr( $key ); ?>_tab resp-tab-item"
									id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab"
								>
									<span><?php echo apply_filters( 'woocommerce_product_' . $key .
									                                '_tab_title', esc_html( $tab['title'] ), $key ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php foreach ( $tabs as $key => $tab ) : ?>
							<div class=" resp-tab-content resp-tab-content-active additional_info_grid"
								id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel"
							>
								<?php if ( isset( $tab['callback'] ) ) {
									call_user_func( $tab['callback'], $key, $tab );
								} ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('#horizontalTab1').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
			</script>
		</div>
	
	<?php endif;
}

add_filter( 'woocommerce_product_additional_information_heading', 'theoak_heading_tab_desc_remove' );
add_filter( 'woocommerce_product_description_heading', 'theoak_heading_tab_desc_remove' );
function theoak_heading_tab_desc_remove($header){
	$header = false;
	return $header;
}
/*
 * Tabs reviews single product
 */
add_filter( 'woocommerce_review_gravatar_size', 'theoak_resize_gravatar' );
function theoak_resize_gravatar(){
return '80';
}

remove_filter( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
add_action( 'woocommerce_review_after_comment_text', 'woocommerce_review_display_rating', 10 );

