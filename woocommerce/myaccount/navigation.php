<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$endpoint_icons = apply_filters( 'hongo_my_account_endpoint_icons', array() );

do_action( 'woocommerce_before_account_navigation' );

?>

<nav class="woocommerce-MyAccount-navigation">
	<ul class="alt-font">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) { ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
					<?php if( ! empty( $endpoint_icons ) && ! empty( $endpoint_icons[$endpoint] ) ) { ?>
						<i class="<?php echo $endpoint_icons[$endpoint] ?>"></i>
					<?php } ?>
					<?php echo esc_html( $label ); ?>
				</a>
			</li>
		<?php } ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
