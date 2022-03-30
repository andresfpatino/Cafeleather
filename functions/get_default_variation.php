<?php 

function get_default_variation( $product ){

    $attributes_count = count($product->get_variation_attributes());
    $default_attributes = $product->get_default_attributes();

    // If no default variation exist we exit
    if( $attributes_count != count($default_attributes) )
        return false;

    // Loop through available variations
    foreach( $product->get_available_variations() as $variation ){
        $found = true;
        // Loop through variation attributes
        foreach( $variation['attributes'] as $key => $value ){
            $taxonomy = str_replace( 'attribute_', '', $key );
            // Searching for a matching variation as default
            if( isset($default_attributes[$taxonomy]) && $default_attributes[$taxonomy] != $value ){
                $found = false;
                break;
            }
        }
        // If we get the default variation
        if( $found ) {
            $default_variaton = $variation;
            break;
        }
        // If not we continue
        else {
            continue;
        }
    }
    return isset($default_variaton) ? $default_variaton : false;
}

function move_variations_single_price(){
    global $product, $post;
    if ( $product->is_type( 'variable' ) ) {
        // removing the variations price for variable products
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
        // Change location and inserting back the variations price
        add_action( 'woocommerce_single_product_summary', 'replace_variation_single_price', 10 );
    }
}
add_action( 'woocommerce_before_single_product', 'move_variations_single_price', 1 );


function replace_variation_single_price(){
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

    // Styles ?>
    <style>
        div.woocommerce-variation-price,
        div.woocommerce-variation-availability,
        div.hidden-variable-price {
            height: 0px !important;
            overflow:hidden;
            position:relative;
            line-height: 0px !important;
            font-size: 0% !important;
        }
    </style>
    <?php // Jquery ?>
    <script>
        jQuery(document).ready(function($) {
            var a = 'div.wc-availability', p = 'p.price';

            $('input.variation_id').change( function(){
                if( '' != $('input.variation_id').val() ){
                    if($(a).html() != '' ) $(a).html('');
                    $(p).html($('div.woocommerce-variation-price > span.price').html());
                    $(a).html($('div.woocommerce-variation-availability').html());
                } else {
                    if($(a).html() != '' ) $(a).html('');
                    $(p).html($('div.hidden-variable-price').html());
                }
            });
        });
    </script>
    <?php
     
    echo '<div class="wc-availability">' . $availiability . '</div> <div class="hidden-variable-price" > '.$price.'</div>';
}