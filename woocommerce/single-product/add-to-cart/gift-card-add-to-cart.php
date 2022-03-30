<?php
/**
 * Gift Card product add to cart
 *
 * @author  Yithemes
 * @package  yith-woocommerce-gift-cards\templates\single-product\add-to-cart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}
$product_id = yit_get_product_id( $product );

?>
<div class="gift_card_template_button variations_button">

    <div class="gift-inner-container">

        <?php if ( ! $product->is_sold_individually() ) : ?>
            <?php woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) ); //phpcs:ignore --nonce and wc function?>
        <?php endif; ?>

        <button type="submit"
                class="gift_card_add_to_cart_button button alt"><?php echo esc_html( apply_filters( 'ywgc_add_to_cart_button_text', $product->single_add_to_cart_text() ) ); ?></button>
        <input type="hidden" name="add-to-cart" value="<?php echo absint( $product_id ); ?>" />
        <input type="hidden" name="product_id" value="<?php echo absint( $product_id ); ?>" />
        
        <a href="#preview-gift-card" class="preview-gift-card button modal-is-trigger" data-tab="#gift-card-content">
            <?php _e( 'Preview gift card', 'cafe_leather'); ?> 
        </a>

    </div>
</div>
