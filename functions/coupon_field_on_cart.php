<?php 

function bt_rename_coupon_field_on_cart( $translated_text, $text, $text_domain ) {
    global $wp_session;
	if ( is_admin() || 'woocommerce' !== $text_domain ) {		
		return $translated_text;
	}
	if ( 'Coupon' === $text ) {
		$translated_text1 = __( 'Gift card or discount code ', 'hongo-child' );
		$translated_text2 = __( 'This coupon does not apply to backorder products.', 'hongo-child' );
		
		$translated_text = $translated_text1;
		if ($wp_session['cart_backorder'] == "block") {
			$translated_text = $translated_text1.", ". $translated_text2;
	    }
	}

	if ('Apply coupon' === $text){
		$translated_text = __( 'Apply', 'hongo-child' );
	}

	return $translated_text;
}
add_filter( 'gettext', 'bt_rename_coupon_field_on_cart', 10, 3 );
