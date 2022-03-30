<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


$text_p  = __("From the very beginning, our commitment is to keep our customers at the center of everything. That's why we created the Café Club, a place where all Cafeliers will feel at home. You can earn 5% credit from all your purchases, join Café Events as a VIP, get early access to promotions, rewards, limited stock, specialty birthday discounts, sales as well as member-only exclusive offers, and much more. Above you will find your credits available. 
Welcome to The Family.", 'cafe_leather');

$text_p2  = __("Introduce a friend to Café Leather and they will receive a 15% OFF. When they use it, you’ll get 10€ credit.", 'cafe_leather');


?>

<div>
	<p class="text-club">  <?php echo $text_p; ?>	</p>
	<div id="stamped-rewards-widget" data-widget-type="rewards-referral" data-label-description="<?php echo $text_p2; ?>"></div>
</div>


<?php

/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_dashboard' );



/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action( 'woocommerce_before_my_account' );


/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action( 'woocommerce_after_my_account' );



