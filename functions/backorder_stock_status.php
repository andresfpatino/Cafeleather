<?php 

// Function that will check the stock status and display the corresponding additional text
function get_stock_status_text( $product, $name, $term_slug ){
    foreach ( $product->get_available_variations() as $variation ){
        if($variation['attributes'][$name] == $term_slug ) {
            $is_in_stock = $variation['is_in_stock'];
            $backordered = get_post_meta( $variation['variation_id'], '_backorders', true );
            $stock_qty   = get_post_meta( $variation['variation_id'], '_stock', true );
            break;
        }
    }
    $stock_status_text = $is_in_stock == 1 ? 'in-stock' : 'out-of-stock';
    return $backordered !== 'no' && $stock_qty <= 0 ? 'on-backorder' : $stock_status_text;
}


// The hooked function that will add the stock status to the dropdown options elements as attribute.
function show_stock_status_in_dropdown( $html, $args ) {

    // Only if there is a unique variation attribute (one dropdown)
    if( sizeof($args['product']->get_variation_attributes()) == 1 ) :

		$options               = $args['options'];
		$product               = $args['product'];
		$attribute             = $args['attribute']; // The product attribute taxonomy
		$name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
		$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
		$class                 = $args['class'];
		$show_option_none      = $args['show_option_none'] ? true : false;
		$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );

		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}

		$html = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
		$html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						// HERE Added the function to get the text status
						$stock_status = get_stock_status_text( $product, $name, $term->slug );
						$html .= '<option value="' . esc_attr( $term->slug ) . '" data-stock_status="'. $stock_status.'"' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
					}
				}
			} else {
				foreach ( $options as $option ) {
					$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
					// HERE Added the function to get the text status
					$stock_status = get_stock_status_text( $product, $name, $option );
					$html .= '<option value="' . esc_attr( $option ) . '" ' . $selected . ' data-stock_status="'.$stock_status.'" >' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
				}
			}
		}
    	$html .= '</select>';

    endif;

    return $html;
}
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'show_stock_status_in_dropdown', 10, 2);
