<?php
/**
 * Gift Card product add to cart
 *
 * @author  Yithemes
 * @package yith-woocommerce-gift-cards\templates\single-product\add-to-cart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  ?>


<section id="choose-amount" class="amount-section">

    <h2 class="step-title"> <?php _e( 'Step 1 of 3 ', 'cafe_leather'); ?> </h2>    
	<h3> <?php _e( 'Choose Your Amount', 'cafe_leather'); ?></h3>

	<?php if ( $amounts ) : ?>

		<?php do_action( 'yith_gift_card_amount_selection_first_option', $product ); ?>

        <div class="row-ammounts">
            <?php foreach ( $amounts as $value => $item ) : ?>
                <button class="ywgc-predefined-amount-button ywgc-amount-buttons" value="<?php echo wp_kses( $item['amount'], 'post' ); ?>"
                        data-price="<?php echo wp_kses( $item['price'], 'post' ); ?>"
                        data-wc-price="<?php echo strip_tags( wc_price( $item['price'] ) ); //phpcs:ignore --wc function?>">
                    <?php echo wp_kses( apply_filters( 'yith_gift_card_select_amount_values', $item['title'], $item ), 'post' ); ?>
                </button>
                <input type="hidden" class="ywgc-predefined-amount-button ywgc-amount-buttons" value="<?php echo wp_kses( $item['amount'], 'post' ); ?>"
                    data-price="<?php echo wp_kses( $item['price'], 'post' ); ?>"
                    data-wc-price="<?php echo strip_tags( wc_price( $item['price'] ) ); //phpcs:ignore --wc function?>" >
            <?php endforeach; ?>
        </div>
		
    <?php endif; ?>

</section>

<?php 
	do_action( 'yith_gift_card_amount_selection_last_option', $product );
	do_action( 'yith_gift_cards_template_after_amounts', $product );
