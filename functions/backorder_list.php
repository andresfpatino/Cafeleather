<?php 

// Create menu item
function menu_backorder() {
    add_menu_page(
		'Backorders', 
		'Backorders', 
		'manage_options', 
		'backorder', 
		'backorder_list',
		'',
		50
	);
    add_submenu_page( 'backorders', 'Date', 'Date', 'backorder_list_product', '', '');
    add_submenu_page('backorder','Date','Date','manage_options','Date','backorder_list_product');
}
add_action('admin_menu', 'menu_backorder');


// Backorder default page
function backorder_list(){

	global $wpdb;
	$has_orders = $wpdb->get_results("SELECT * FROM wp_posts as p, wp_postmeta as pm WHERE pm.post_id = p.ID AND pm.meta_key = 'backorder'");

	if ( $has_orders ) : ?>
        <h3>Backorders<h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?> alt-font"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
                    <?php endforeach; ?>
                </tr>
            </thead>    
            <tbody>
                <?php foreach ( $has_orders as $customer_order ) {
                    $order      = wc_get_order( $customer_order ); 
                    $item_count = $order->get_item_count() - $order->get_item_count_refunded(); ?>

                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
                        <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
                                
                                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : 
                                    do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); 
        
                                    elseif ( 'order-number' === $column_id ) : ?>
                                        <a href="<?php echo esc_url( "/wp-admin/post.php?post=".$order->get_id()."&amp;action=edit" ); ?>">
                                            <?php echo esc_html( _x( '#', 'hash before order number', 'hongo' ) . $order->get_order_number() ." ".$order->get_billing_first_name()." ".$order->get_billing_last_name()); ?>
                                        </a>
    
                                    <?php elseif ( 'order-date' === $column_id ) : ?>
                                        <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
    
                                    <?php elseif ( 'order-status' === $column_id ) : 
                                        echo esc_html( wc_get_order_status_name( $order->get_status() ) ); 
    
                                    elseif ( 'order-total' === $column_id ) :         
                                        echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'hongo' ), $order->get_formatted_order_total(), $item_count ) );
    
                                    elseif ( 'order-actions' === $column_id ) : ?>                                        
                                        <a href="<?php echo esc_url( "/wp-admin/post.php?post=".$order->get_id()."&amp;action=edit" ); ?>"> Edit</a>   
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
	
		<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>
	
		<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
			<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
				<?php if ( 1 !== $current_page ) : ?>
					<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'hongo' ); ?></a>
				<?php endif; ?>	
				<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
					<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'hongo' ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	
	<?php else : ?>
		<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
			<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				<?php esc_html_e( 'Go to the shop', 'hongo' ); ?>
			</a>
			<?php esc_html_e( 'No order has been made yet.', 'hongo' ); ?>
		</div>
	<?php endif; 
}


// Backorder list date page
function backorder_list_product(){

	global $wpdb;
	$has_orders = $wpdb->get_results("SELECT * FROM wp_posts as p, wp_postmeta as pm WHERE pm.post_id = p.ID AND pm.meta_key = 'date_estimated_backorder'");
	
	if ( $has_orders ) {?>
        <h3>Backorders<h2>
		<table class="wp-list-table widefat fixed striped table-view-list posts">
			<thead>
				<tr>
				<td>Product</td>
				<td>Estimated Date</td>
				<td>Edit</td>
				</tr>
			</thead>
	
			<tbody>
				<?php foreach ( $has_orders as $product_order ) {
					//$order      = wc_get_order( $customer_order ); 
					//$item_count = $order->get_item_count() - $order->get_item_count_refunded(); ?>
					<tr class="woocommerce-orders-table__row woocommerce-orders-table__row order">
						<td class="woocommerce-orders-table__cell">
                            <a href="<?php echo esc_url( "/wp-admin/post.php?post=".$product_order->ID."&amp;action=edit" ); ?>">
                                <?php echo $product_order->ID." ". $product_order->post_title." ". $product_order->post_excerpt; ?>
                            </a>
						</td>
						<td class="woocommerce-orders-table__cell">
						    <?php echo $product_order->meta_value; ?>	
						</td>
						<td class="woocommerce-orders-table__cell">
                            <a href="<?php echo esc_url( "/wp-admin/post.php?post=".$product_order->ID."&amp;action=edit" ); ?>">
                                <?php echo $product_order->ID; ?>	
                            </a>
						</td>					
					</tr>
				<?php } ?>
			</tbody>
		</table>
	
		<?php do_action( 'woocommerce_before_account_orders_pagination' ); 	
    }

}