<?php 


function product_estimated_shipping_backorder( $data, $product ) {

    if ( $product->managing_stock() && $product->is_on_backorder( 1 ) ) {
        // Add estimated shipping to product
        $date_today = date("d-m-Y");
		$date40 = date("F, Y",strtotime($date_today."+ 40 days"));
        update_post_meta( $product->id, 'date_estimated_backorder', $date40 );
    }
}
add_action('woocommerce_get_availability', 'product_estimated_shipping_backorder', 10, 2);


function date_estimated( $order_id ) {

	$order = wc_get_order( $order_id );
	
	foreach ( $order->get_items() as $item_id => $item ) {

		$product = $item->get_product();
		$product_id = $product->get_id();
      
		$product_backorder = get_post_meta( $product_id, 'date_estimated_backorder', true );		
		if($product_backorder){
			update_post_meta( $order_id, 'backorder', $product_id );
		}
	}
}
add_action('woocommerce_thankyou', 'date_estimated', 10, 1);


function add_label_availability_date(){
    $unix_preorder_date = get_post_meta( get_the_ID(), '_wc_pre_orders_availability_datetime', true );
    $expire_preorder_date = date_i18n( get_option('date_format'), $unix_preorder_date );
    $today_date = date(get_option('date_format'));

    if ( empty($unix_preorder_date) || $expire_preorder_date < $today_date) {
	$date_estimated_backorder = get_post_meta( get_the_ID(), 'date_estimated_backorder', true );
    	if ( ! empty( $date_estimated_backorder ) ) { ?>
            <span class='availability_date' style="min-width: 350px;"> <?php _e( 'ESTIMATED SHIPPING', 'cafe_leather'); ?>  <?php echo $date_estimated_backorder; ?> </span>
        <?php
    	}
    }
    else {
        echo("<script>console.log('muestrale".$unix_preorder_date."');</script>");
    } 	
}
add_action('woocommerce_after_add_to_cart_button', 'add_label_availability_date', 5, 0);
