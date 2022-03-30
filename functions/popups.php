<?php 

/* 
** Personalizacion
** Tabla de tallas
** Envios y devoluciones
** Garantias
*/

function button_add_personalization(){
	global $product;
    $textadd = __('Add Personalization (+€20)', 'cafe_leather');
    echo '<input type="hidden" id="proId" value="'. $product->get_id() .'">';
    echo '<input id="div-add-per" disabled>';
    echo '<a id="btn-add"  class="button-pers  modal-is-trigger add-button" data-tab="#personalization-cont">' . $textadd . '</a>';	
}
add_action('woocommerce_before_add_to_cart_button', 'button_add_personalization');



function pop_up_btns_woocommerce(){

	global $product;
	$categorys = $product->get_categories();

	$gloves = strpos($categorys, 'Gloves');
	$guantes = strpos($categorys, 'Guantes');

	$shirts = strpos($categorys, 'Shirts');
	$camisas = strpos($categorys, 'Camisas');

	$hombre = strpos($categorys, 'Hombre');
	$mujer = strpos($categorys, 'Mujer');
	$man = strpos($categorys, 'Man');
	$woman = strpos($categorys, 'Woman');

	if ( ($hombre !== false && $mujer !== false) || ($man !== false && $woman !== false)) {
		$textunisex = 'unisex';
	} else {
		$textunisex = 'no';
	}

	echo '<input type="hidden" id="pback" name="pback" value="0">';

	echo '<div class="row-popup-buttons">';
		if (
			$gloves !== false || 
			$guantes !== false || 
			$shirts !== false || 
			$camisas !== false 
			) {			
			
			echo "<input type='hidden' id='unisexId' name='unisexId' value='$textunisex'>";

			echo "
				<div class='col'>
					<a href='#size-chart' class='modal-is-trigger' data-tab='#size-guide-modal-content'>						
						<img class='ico' src='".get_stylesheet_directory_uri()."/assets/img/garment-icon.svg'>
						<span>". __('Size Chart', 'cafe_leather') ." </span>
					</a>
				</div>";

			if ( has_term( 'gloves', 'product_cat' ) || has_term( 'guantes-de-piel', 'product_cat' ) ) {
				echo "
				<div class='col'>
					<a href='#fit-finder' class='modal-is-trigger' data-tab='#size-guide-modal-content'>						
						<img class='ico' src='".get_stylesheet_directory_uri()."/assets/img/need-a-hand-icon.svg'>						
						<span> ". __('Need a hand? Find Your Size', 'cafe_leather') ." </span>
					</a>
				</div>";
			}
		}

		echo "
			<div class='col'>
				<a href='#free-shipp' class='modal-is-trigger free-icon' data-tab='#free-shipp-cont'>					
					<img class='ico' src='".get_stylesheet_directory_uri()."/assets/img/shipping-icon.svg'>
					<span>". __('Free Shipping & Free Returns', 'cafe_leather') ." </span>
				</a>
			</div>";

		echo "
			<div class='col'>
				<a href='#guarantee' class='modal-is-trigger' data-tab='#guarantee-cont'>					
					<img class='ico' src='".get_stylesheet_directory_uri()."/assets/img/guarantee-icon.svg'>
					<span>". __('"Made to last" Guarantee', 'cafe_leather') ."</span>
				</a>
			</div>";
	echo '<div>';
}
add_action('woocommerce_after_add_to_cart_button', 'pop_up_btns_woocommerce', 10, 0);