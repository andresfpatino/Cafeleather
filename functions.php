<?php

/*
* Disable scripts emoji
*/
require_once(dirname(__FILE__).'/functions/disable_scripts_emoji.php');


/*
* Style - Scripts 
*/
require_once(dirname(__FILE__).'/functions/wp_enqueue_scripts.php');


/* 
* Remove generate press copyright 
*/
add_filter('generate_copyright', function(){} );


/* 
* Gutemberg Blocks 
* # Custom block category "Café Leater Custom Blocks"
* # Block Hero slider 
* # Block Client slider
* # Block Collection products
* # Block Collection products V2
* # Block Founded products
* # Block Single product
*/

# Custom block category
require_once(dirname(__FILE__).'/template-parts/blocks/register_cafe_leather_category.php');

function cafe_init_block_types() {
    if( function_exists('acf_register_block_type') ) {	

      # Block Hero slider 
      require_once(dirname(__FILE__).'/block_types/register_hero_slider.php');
           
      # Block Client slider
      require_once(dirname(__FILE__).'/block_types/register_client_slider.php');

      # Block Collection products
      require_once(dirname(__FILE__).'/block_types/register_collection_products.php');

      # Block Collection products V2
      require_once(dirname(__FILE__).'/block_types/register_collection_products_v2.php');

      # Block Founded products
      require_once(dirname(__FILE__).'/block_types/register_founded_product.php');

      # Block Single product
      require_once(dirname(__FILE__).'/block_types/register_single_product.php');

    }
}
add_action('acf/init', 'cafe_init_block_types');


/*
* Café Size guide
*/
require_once(dirname(__FILE__).'/functions/cafe-size-guide.php');


/*
* Pre-order features.
*/
require_once(dirname(__FILE__).'/functions/pre_orders.php');

/*
*  Cafe Lab Ends.
*/
require_once(dirname(__FILE__).'/functions/cafe_lab_ends.php');


/*
*  Replace price.
*/
require_once(dirname(__FILE__).'/functions/replace_price.php');
	

/*
*  Utility function to get the default variation (if it exist).
* Potencialmente a eliminar, genera un bug que oculta el precio en el single product
*/
// require_once(dirname(__FILE__).'/functions/get_default_variation.php');


/*
* Move Stripe Payment Request Button on product page.
*/
remove_action( 'woocommerce_after_add_to_cart_quantity', array( WC_Stripe_Payment_Request::instance(), 'display_payment_request_button_html' ), 1 );
remove_action( 'woocommerce_after_add_to_cart_quantity', array( WC_Stripe_Payment_Request::instance(), 'display_payment_request_button_separator_html' ), 2 );

add_action( 'woocommerce_after_add_to_cart_button', array( WC_Stripe_Payment_Request::instance(), 'display_payment_request_button_html' ), 4 );
add_action( 'woocommerce_after_add_to_cart_button', array( WC_Stripe_Payment_Request::instance(), 'display_payment_request_button_separator_html' ), 3 );


/*
* Class Rational_Meta_Box.
*/
require_once(dirname(__FILE__).'/functions/class_rational_meta_box.php');


/* 
* Stripe Personalization Checkout.
*/
function change_my_icons( $icons ) {
  echo '<span class="more-pay" style="display:none;"> '. __( 'and more...', 'hongo-child' ) .' </span>';
  return $icons;
}
add_filter( 'wc_stripe_payment_icons', 'change_my_icons' );


/* 
* Change coupon text checkout.
*/
require_once(dirname(__FILE__).'/functions/coupon_field_on_cart.php');


/*
 * Metabox Barcode.
*
* - Add Barcode to simple products.
* - Add Barcode to variable products.
*/
require_once(dirname(__FILE__).'/functions/barcode_simple_products.php');
require_once(dirname(__FILE__).'/functions/barcode_variable_products.php');


/* 
* Metaboxes Materials & Specifications.
*
* It's necessary to remove this function at the time of completing the content product information.
* Otherwise, the information will be duplicated with the new ACF fields. */
require_once(dirname(__FILE__).'/functions/materials_specifications_cafe.php');


/*
* POP-UPS.
*/
require_once(dirname(__FILE__).'/functions/popups.php');


/*
* Add extra data to cart item.
*/
require_once(dirname(__FILE__).'/functions/extra_data_to_cart_item.php');


/*
 * Back-orders.
*
* -	Add Estimated Shipping On Backorder.
* -	Create menu item, backorder list page.
* - Function that will check the stock status and display the corresponding additional text.
*/
require_once(dirname(__FILE__).'/functions/backorder_date_estimated.php');
require_once(dirname(__FILE__).'/functions/backorder_list.php');
require_once(dirname(__FILE__).'/functions/backorder_stock_status.php');


/*
* My Account Navigation.
*/
require_once(dirname(__FILE__).'/functions/my_account_navigation.php');


/* 
* Product Gallery Carousel.
*/
require_once(dirname(__FILE__).'/functions/product_gallery_carousel.php');


/* 
* Zero discount for excluded products.
*/
require_once(dirname(__FILE__).'/functions/zero_discount_for_excluded_products.php');


/* 
*  Register Menus
* # Mega menu
* # Menu archive sticky
* # Café about menu
*/
require_once(dirname(__FILE__).'/functions/register_menus.php');


function add_about_menu_cafe( $output ) {  
    wp_nav_menu( array( 
    'theme_location' => 'cafe-about-menu', 
    'container_class' => 'about-menu main-nav' ) );   
    return $output;
}
add_filter( 'generate_after_primary_menu', 'add_about_menu_cafe' );


/* 
* Register Sidebars
* # Mega menu sidebar 
*/
require_once(dirname(__FILE__).'/functions/register_sidebar.php');


/*
*  Gift card.
*/
require_once(dirname(__FILE__).'/functions/gift_card.php');


/*
* Styles -  Landing Page Christmas Gift Gide
*/
require_once(dirname(__FILE__).'/functions/styles_gift_guide.php');


/* 
 * WooCommerce Hooks
* */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5, 0);
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

function fun(){ 
	$main_name_title = get_post_meta( get_the_ID(), 'cafe_product-name', true );
	$subname = get_post_meta( get_the_ID(), 'cafe_product-subname', true ); ?>
	<h2 class="woocommerce-loop-product_title">
		<?php if (!empty ( $main_name_title )) : echo $main_name_title; else : echo esc_html( get_the_title() ); endif; ?>		
		<span class="colorway"> <?php if (!empty($subname )) : echo get_post_meta( get_the_ID(), 'cafe_product-subname', true ); endif; ?> </span>		
	</h2> <?php
}
add_action('woocommerce_shop_loop_item_title','fun',10);


/* 
 * Add variations in product Loop
* */
# require_once(dirname(__FILE__).'/functions/variations_product-loop.php');


/* 
 * Custom search navigation
* */
require_once(dirname(__FILE__).'/functions/search_navigation.php');


/*
 *  Class hongo child metaboxes product
* */
require_once(dirname(__FILE__).'/functions/class_hongo_child.php');


/*
 *  Change shopping cart GeneratePress 
**/
add_filter( 'generate_svg_icon', function( $output, $icon ) {
    if ( 'shopping-cart' === $icon ) {
        $svg = '<?xml version="1.0" encoding="iso-8859-1"?>
				<svg version="1.1" id="shopping-bag" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 489 489"><g><path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/></g></svg>';
        return sprintf(
            '<span class="gp-icon %1$s">
                %2$s
            </span>',
            $icon, $svg
        );
    }
    return $output;
}, 15, 2 );


/*
 * Habilitar imagenes SVG 
* */
function add_svg_mime_types($mimes) {
	if ( current_user_can('administrator') ){
		$mimes['svg'] = 'image/svg+xml';	 
	}
	return $mimes;
}
add_filter('upload_mimes', 'add_svg_mime_types', 99);