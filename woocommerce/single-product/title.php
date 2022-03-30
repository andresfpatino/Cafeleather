<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author     WooThemes
 * @package	WooCommerce/Templates
 * @version	4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;


if (is_plugin_active('woocommerce-pre-orders/woocommerce-pre-orders.php')) {
	if ( WC_Pre_Orders_Product::product_can_be_pre_ordered( $product ) ) {
		echo "<span class='preproduct-text'>";
			_e( 'Pre-order', 'hongo-child' );
		echo "</span>";
	}
} 

$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true ); ?>
<span class='titilep'></span>
<div class="reviews-top modal-is-trigger" data-tab='#reviews-cont'>
	<?php echo do_shortcode('[Woo_stamped_io type="badge"]'); ?>
</div>
<h1 class="product_title entry-title">
	<?php if (! empty ( $main_name_title )) {
		echo get_post_meta( get_the_ID(), 'cafe_product-name', true );
	}
	else {
		echo esc_html( get_the_title() );
	} ?>
	<span class="colorway"><?php echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?></span>
</h1>