<?php 

function zero_discount_for_excluded_products($discount, $discounting_amount, $cart_item, $single, $coupon ){
    global $wp_session;
	$dis = 0;
    if ( isset( $cart_item['extras_product'] ) ) {
        $wp_session['cart_backorder'] = 'block';
		return $dis;
	}	
    return $discount;
}
add_filter( 'woocommerce_coupon_get_discount_amount', 'zero_discount_for_excluded_products', 12, 5 );