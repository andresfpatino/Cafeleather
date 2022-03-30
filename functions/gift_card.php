<?php 

// Load css and Js
function enqueue_styles_gift_card() {	
    if ( is_single(119972) || is_single(119975) ) {
        wp_enqueue_style( 'gift-card-css', get_stylesheet_directory_uri() . '/assets/css/gift-card.css');
        wp_enqueue_script( 'gift-card-js', get_stylesheet_directory_uri() . '/assets/js/gift-card.js', array('jquery'), "1.0", true );	
    }
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_gift_card', 9999);



// Label in single product
function label_on_sale_gift_card(){
	if ( is_single(119972) || is_single(119975) ) {
		global $product;		
		$on_sale = $product->get_add_discount_settings_status();
		$on_sale_value = get_post_meta( $product->get_id(), '_ywgc_sale_discount_value', true );

		if ( $on_sale && $on_sale_value ){
			$on_sale_text = get_post_meta( $product->get_id(), '_ywgc_sale_discount_text', true );
			echo '<p class="gift-card-on-sale-text">' . $on_sale_text . '</p>';
		}
	}
}
add_action( 'woocommerce_single_product_summary' , 'label_on_sale_gift_card', 5);


// Description
function short_description_cafeleather(){
	if ( is_single(119972) || is_single(119975) ) {
		the_excerpt();
	}
}
add_action( 'woocommerce_single_product_summary' , 'short_description_cafeleather');


// Button anchor #choose-amount
function button_gift_card() { 
	if ( is_single(119972) || is_single(119975) ) : ?>
		<a href="#choose-amount" class="button btn-gift-card"> 
			<?php _e( 'Shop e-gift cards', 'cafe_leather'); ?>			
		</a> 
	<?php endif;
}
add_action( 'woocommerce_single_product_summary' , 'button_gift_card');