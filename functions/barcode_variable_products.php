<?php 

// Add our Custom Fields to variable products.
function barcode_cafe_field_variation( $loop, $variation_data, $variation ) {

	echo '<div class="options_group form-row form-row-full">';

 	// Text Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_barcode_cafe_var[' . $variation->ID . ']',
			'label'       => __( 'BARCODE', 'woocommerce' ),
			'placeholder' => 'write your barcode here',
			'desc_tip'    => true,
			'description' => __( "Código de barras Café Leather.", "woocommerce" ),
			'value' => get_post_meta( $variation->ID, '_barcode_cafe', true )
		)
 	);

	echo '</div>';

}
add_action( 'woocommerce_variation_options', 'barcode_cafe_field_variation', 10, 3 );


//  Save our variable product fields.
function barcode_cafe_field_variation_save( $post_id ){
 	$woocommerce_text_field = $_POST['_barcode_cafe_var'][ $post_id ];
	update_post_meta( $post_id, '_barcode_cafe', esc_attr( $woocommerce_text_field ) );
}
add_action( 'woocommerce_save_product_variation', 'barcode_cafe_field_variation_save', 10, 2 );
