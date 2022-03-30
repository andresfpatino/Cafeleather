<?php
/**
 * My Pre-orders
 *
 * Shows the list of pre-order items on the account page
 *
 * @author  WooThemes
 * @package WC_Pre_Orders/Templates
 * @version 1.4.4
 */
?>

<?php if ( $show_title ) : ?>
	<h2><?php _e( 'My Pre-Orders', 'wc-pre-orders' ); ?></h2>
<?php endif; ?>

<span class="link-account"> <a class="link-account-a" href="https://dev.cafeleather.com/my-account/pre'orders/">My Pre Orders</a> <span>
	<?php 

global $wpdb;
$user = wp_get_current_user();
$id = $user->ID;

$customer_orders = $wpdb->get_results("SELECT wp.id as id from wp_posts wp JOIN wp_postmeta wpm ON wp.id = wpm.post_id JOIN wp_postmeta wpm2 ON wp.id = wpm2.post_id WHERE wp.post_type = 'shop_order' AND ( wpm.meta_key ='_customer_user' AND wpm.meta_value='".$id."' )AND ( wpm2.meta_key = '_wc_pre_orders_status' )");

//	var_dump($customer_orders);

	
	if ( !empty($customer_orders )) : ?>
	
		<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
			<thead>
				<tr>
					<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
						<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?> alt-font"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
					<?php endforeach; ?>
				</tr>
			</thead>
	
			<tbody>
				<?php foreach ( $customer_orders as $customer_order ) {
					
					$order      = wc_get_order( $customer_order->id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
					$item_count = $order->get_item_count() - $order->get_item_count_refunded();
					?>
					<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
						<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
							<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
								<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
									<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
	
								<?php elseif ( 'order-number' === $column_id ) : ?>
									<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
										<?php echo esc_html( _x( '#', 'hash before order number', 'cafe_leather' ) . $order->get_order_number() ); ?>
									</a>
	
								<?php elseif ( 'order-date' === $column_id ) : ?>
									<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
	
								<?php elseif ( 'order-status' === $column_id ) : ?>
									<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
	
								<?php elseif ( 'order-total' === $column_id ) : ?>
									<?php
									/* translators: 1: formatted order total 2: total order items */								
									echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'cafe_leather' ), $order->get_formatted_order_total(), $item_count ) );
									?>
	
								<?php elseif ( 'order-actions' === $column_id ) : ?>
									<?php
									$actions = wc_get_account_orders_actions( $order );
	
									if ( ! empty( $actions ) ) {
										foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
											echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
										}
									}
									?>
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
					<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'cafe_leather' ); ?></a>
				<?php endif; ?>
	
				<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
					<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'cafe_leather' ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
<?php else : ?>

	<p><?php _e( 'You have no pre-orders...', 'wc-pre-orders' ); ?></p>

<?php endif;
