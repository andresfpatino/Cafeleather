<?php 

// Register field
function barcode_cafe_add_field() {

	global $woocommerce, $post;

	echo '<div class="options_group">';

 	// Text Field
	woocommerce_wp_text_input(
		array(
			'id'          => '_barcode_cafe',
			'label'       => __( 'BARCODE', 'woocommerce' ),
			'placeholder' => 'write your barcode here',
			'desc_tip'    => true,
			'description' => __( "Código de barras Café Leather.", "woocommerce" )
		)
 	);
 	echo '</div>';
}
add_action( 'woocommerce_product_options_inventory_product_data', 'barcode_cafe_add_field' );


// Save our simple product fields.
function barcode_cafe_add_field_save( $post_id ){
    // Text Field
    $woocommerce_text_field = $_POST['_barcode_cafe'];
   update_post_meta( $post_id, '_barcode_cafe', esc_attr( $woocommerce_text_field ) );

}
add_action( 'woocommerce_process_product_meta', 'barcode_cafe_add_field_save' );