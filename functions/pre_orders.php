<?php 

/**
 * Report pre-order status
*/
function wc_reports_preorder_status ( $order_status ) {
	$order_status[] = 'pre-ordered';
	return $order_status;
}
add_filter( 'woocommerce_reports_order_statuses', 'wc_reports_preorder_status' );


/**
 * Pre-order custom options
*/
function pre_order_custom_options(){ 
	woocommerce_wp_text_input(
		array(
			'id'          => 'cafe_wc_pre_orders_fund',
			'label'       => __( 'Pre-Order Funded', 'wc-pre-orders' ),
			'description' => __( 'Ingresa un número sin incluir el simbolo % para definir el porcentaje Funded.', 'wc-pre-orders' ),
			'desc_tip'    => true,
		)
	);

	// Cafe Lab Ends.
	// $cafe_lab_end_timestamp = WC_Pre_Orders_Product::get_localized_availability_datetime_timestamp( $post->ID );
	$cafe_lab_end_timestamp = get_post_meta( get_the_ID(), 'cafe_wc_pre_orders_cafe_lab_end', true ); ?>
    
    <p class="form-field _wc_pre_orders_cafe_lab_end_field ">
		<label for="cafe_wc_pre_orders_cafe_lab_end"> <?php _e( 'Cafe Lab Ends', 'wc-pre-orders' ); ?> </label>
		<input type="text" class="short" name="cafe_wc_pre_orders_cafe_lab_end" id="cafe_wc_pre_orders_cafe_lab_end" value="<?php echo esc_attr( ( 0 === $cafe_lab_end_timestamp ) ? '' : date( 'Y-m-d H:i', $cafe_lab_end_timestamp ) ); ?>" placeholder="YYYY-MM-DD HH:MM"  />
	</p>

	<script>
		jQuery( document ).ready( function( $ ) {            
            'use strict';
			var $dateTimeField      = null;

			// Get the proper datetime field (either on the edit product page or the pre-orders > actions tab
			if ( $( 'input[name="cafe_wc_pre_orders_cafe_lab_end"]' ).length ) {
				$dateTimeField = $( 'input[name="cafe_wc_pre_orders_cafe_lab_end"]' );
			} else if ( $( 'input[name="wc_pre_orders_action_new_cafelab_date"]').length ) {
				$dateTimeField = $( 'input[name="wc_pre_orders_action_new_cafelab_date"]' );
			}

			// Add Pre-Order DateTimePicker (see http://trentrichardson.com/examples/timepicker/)
			if ( null !== $dateTimeField ) {
				$dateTimeField.datetimepicker({
					dateFormat: 'yy-mm-dd',
					numberOfMonths: 1
				});
			}
		});
	</script> <?php
} 
add_action( 'wc_pre_orders_product_options_start', 'pre_order_custom_options');


/**
 * Pre-order custom save fields
*/
function pre_order_custom_save_fields( $post_id ){ 
	
	if ( isset( $_POST['cafe_wc_pre_orders_fund'] ) && is_numeric( $_POST['cafe_wc_pre_orders_fund'] ) ) {
		update_post_meta( $post_id, 'cafe_wc_pre_orders_fund', $_POST['cafe_wc_pre_orders_fund'] );
	} else {
		update_post_meta( $post_id, 'cafe_wc_pre_orders_fund', '' );
	}

    /*
	 * Save the Cafe Lab Ends.
	 *
	 * The date/time a pre-order is released is saved as a unix timestamp adjusted for the site's timezone. For example,
	 * when an admin sets a pre-order to be released on 2013-06-25 12pm EST (UTC-4), it is saved as a timestamp equivalent
	 * to 2013-12-25 4pm UTC. This makes the pre-order release check much easier, as it's a simple timestamp comparison,
	 * because the release datetime and the current time are both in UTC.
	 */
	if ( ! empty( $_POST['cafe_wc_pre_orders_cafe_lab_end'] ) ) {
		try {
			// Get datetime object from site timezone.
			$datetime = new DateTime( $_POST['cafe_wc_pre_orders_cafe_lab_end'] );

			// Get the unix timestamp (adjusted for the site's timezone already).
			$timestamp = $datetime->format( 'U' );

			// Don't allow availability dates in the past.
			if ( $timestamp <= time() ) {
				$timestamp = '';
			}

			// Set the availability datetime.
			update_post_meta( $post_id, 'cafe_wc_pre_orders_cafe_lab_end', $timestamp );

		} catch ( Exception $e ) {
			global $wc_pre_orders;
			$wc_pre_orders->log( $e->getMessage() );
		}
	} else {
		delete_post_meta( $post_id, 'cafe_wc_pre_orders_cafe_lab_end' );
	} 
}
add_action( 'wc_pre_orders_save_product_options', 'pre_order_custom_save_fields', 10, 2 );


if (is_plugin_active('woocommerce-pre-orders/woocommerce-pre-orders.php')) {

    add_filter('woocommerce_sale_flash', 'preorder_sale_text', 10, 3);

	/**
	 * Pre-order Sale text
	*/
    function preorder_sale_text($text, $post, $_product) {
        global $product;
        if ( WC_Pre_Orders_Product::product_can_be_pre_ordered( $product ) ) {
            return '<span class="onsale">Pre-Sale</span>';
        }
        else {
            return '<span class="onsale">Sale</span>';
        }
    }
    
	/**
	 * Pre-order body class
	*/
    function preorder_body_class( $classes ) {
        global $product;
        if ( 'yes' === get_post_meta( get_the_ID(), '_wc_pre_orders_enabled', true ) ) {
            $classes[] = 'preorder-product';     
            return $classes;
        }  
        return $classes;	
    }
	add_filter( 'body_class','preorder_body_class' );
}


remove_action( 'woocommerce_single_product_summary', array($GLOBALS['wc_pre_orders']->product, 'add_pre_order_product_message' ), 11 );
remove_action( 'woocommerce_after_shop_loop_item_title', array($GLOBALS['wc_pre_orders']->product, 'add_pre_order_product_message' ), 11 );

add_action( 'woocommerce_after_add_to_cart_button', array($GLOBALS['wc_pre_orders']->product, 'add_pre_order_product_message' ), 2 );
add_action( 'woocommerce_after_shop_loop_item_title', array($GLOBALS['wc_pre_orders']->product, 'add_pre_order_product_message' ), 30 );
