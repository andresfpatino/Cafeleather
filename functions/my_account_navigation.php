<?php

// Account_navigation
function action_woocommerce_before_account_navigation() { 

	$user = wp_get_current_user(); ?>

    <div class="myaccount-header-profile" >
        <div class="container-cl" style="width: 100%;">
            <h1>
                <span class="pre-heading"><?php echo __('Welcome', 'cafe_leather'); ?></span>
                <span class="heading"> <?php echo $user->user_firstname; ?> </span>
                <span class="sub-heading"><?php echo __('Account Info', 'cafe_leather'); ?></span>
            </h1>
            <div class="credits">
                <span class="pre-heading"><?php echo __('Credits', 'cafe_leather'); ?></span>
                <span class="approved text-credits">
                    <div id="stamped-rewards-points-placeholder"></div>
                </span>
            </div>
            <div class="credits">
                <span class="pre-heading"> <?php echo __('Pending', 'cafe_leather'); ?></span>
                <span class="pending text-credits">0</span>
            </div>
            <div class="credits">
                <span class="pre-heading"><?php echo __('Lifetime ', 'cafe_leather'); ?></span>
                <span class="lifetime text-credits" class="">0</span>
            </div>
            <div class="credits-end">
                <span class="pre-heading"><?php echo __('Joined ', 'cafe_leather'); ?></span>
                <span class="first-purchase text-credits">2021</span>
            </div>
        </div>
    </div> 
    <div class='container-cl wrap-my-account'> <?php
}; 

add_action( 'woocommerce_before_account_navigation', 'action_woocommerce_before_account_navigation', 10, 0 ); 


// Menu order
function my_account_menu_order() {
	$textclub = __('The Café Club', 'cafe_leather');
    $textpor = __('Pre-Orders', 'cafe_leather');
    $textrew = __('Rewards', 'cafe_leather');
    $textref = __('Referrals', 'cafe_leather');
    $textpro = __('Profile', 'cafe_leather');
    $textaddr = __('Addresses', 'cafe_leather');
    $textord = __('Orders', 'cafe_leather');
    $textpay = __('Payment Methods', 'cafe_leather');

	$menuOrder = array(
		'dashboard'          => __( $textclub, 'woocommerce' ),
		'orders'             => __( $textord, 'woocommerce' ),
		'my-rewards'          => __( $textrew, 'woocommerce' ),
		'my-referrals'          => __( $textref, 'woocommerce' ),
		'edit-account'    	=> __( $textpro , 'woocommerce' ),
		'edit-address'       => __( $textaddr, 'woocommerce' ),
		'payment-methods'       => __( $textpay, 'woocommerce' ),		
		'customer-logout'    => __( 'Logout', 'woocommerce' ),
	);
	return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );


// Custom endpoints
function hongo_add_endpoint() { 
	add_rewrite_endpoint( 'my-rewards', EP_PAGES );
	add_rewrite_endpoint( 'my-referrals', EP_PAGES ); 
}
add_action( 'init', 'hongo_add_endpoint' );


//  Custom endpoint content
function hongo_my_account_endpoint_content_rewards() { ?>
	<p></p>
	<p class="text-title-st" > <?php echo __('Available Rewards', 'cafe_leather'); ?> </p>
	<div id="stamped-rewards-widget" data-widget-type="rewards-spendings-v2" data-label-description="insufficient"></div>
	<p class="text-title-st" ><?php echo  __('How to get credit', 'cafe_leather'); ?></p>
	<div style="margin-bottom: 46px;" id="stamped-rewards-widget" data-widget-type="rewards-earnings-v2" ></div>
	<div></div><?php
}
add_action( 'woocommerce_account_my-rewards_endpoint', 'hongo_my_account_endpoint_content_rewards' );


function hongo_my_account_endpoint_content_referrals() {
    $textRef = __('Referrals', 'cafe_leather');
	$text_p2  = __("Introduce a friend to Café Leather and they will receive a 15% OFF. When they use it, you’ll get 10€ credit.", 'cafe_leather');	?>
	<p class="text-title-st" ><?php echo $textRef ?></p>
	<div id="stamped-rewards-widget" data-widget-type="rewards-referral" data-label-description="<?php echo $text_p2 ?>"></div>	<?php
}
add_action( 'woocommerce_account_my-referrals_endpoint', 'hongo_my_account_endpoint_content_referrals' );
