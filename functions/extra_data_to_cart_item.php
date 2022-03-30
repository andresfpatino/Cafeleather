<?php 

function dcms_extra_data_to_cart_item( $cart_item_data){

	if($_POST['pback'] == 0 ) return $cart_item_data;

    $extra = "0.00";
	$price = number_format(str_replace(",", ".", $_POST['pback']), 2,".", ",");
	 
	if(!empty($_POST['checkbox-group-1590064328588'])){
		$extra = $extra+"6.00";
	}
	if(!empty($_POST['checkbox-group-1603097558265'])){
		$extra = $extra+"14.90";
	}
	if(!empty($_POST['checkbox-group-1603787759245'])){
		$extra = $extra+"10.00";
	}
	if(!empty($_POST['text-1603926550198'])){
		$extra = $extra+"20.00";
	}
	if(!empty($_POST['radio-group-1590070124761'])){
		$extra = $extra+"25.00";
	}
	if(!empty($_POST['radio-group-5fa28bdc18db3'])){
		$extra = $extra+"30.00";
	}

	/*if(isset($_POST['attribute_pa_iphone11-case'] == "iphone11-promax")){
		$extra = $extra+"10.00";
	}*/
	
    $newPrice = floatval($price) + floatval($extra);
    $cart_item_data['extras_product'] = $newPrice;

    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'dcms_extra_data_to_cart_item', 20, 2 );


function dcms_custom_cart_item_price( $cart ) { 
    foreach (  $cart->get_cart() as $cart_item ) {
        if ( isset( $cart_item['extras_product'] ) ){
            $cart_item['data']->set_price( $cart_item['extras_product'] );
		}
    }
}
add_action('woocommerce_before_calculate_totals', 'dcms_custom_cart_item_price', 20, 1);