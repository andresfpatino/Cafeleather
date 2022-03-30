<?php 

function replace_price(){
    global $product;

    // Main Price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $active_price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    // Sale Price
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
	
    $regular_price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    if ( $active_price !== $regular_price && $product->is_on_sale() ) {
        $price = '<del>' . $regular_price . $product->get_price_suffix() . '</del> <ins>' . $active_price . $product->get_price_suffix() . '</ins>';
	} else {
        $price = $regular_price;
    }

    // When a default variation is set for the variable product
    if( get_default_variation( $product ) ) {
        $default_variaton = get_default_variation( $product );
        if( ! empty($default_variaton['price_html']) ){
            $price_html = $default_variaton['price_html'];
        } else {
            if ( ! $product->is_on_sale() )
                $price_html = $price = wc_price($default_variaton['display_price']);
            else
                $price_html = $price;
        }
        $availiability = $default_variaton['availability_html'];
    } else {
        $price_html = $price;
        $availiability = '';
    }
	return $price;
}