<?php
/**
 * Gift Card product add to cart
 *
 * @author  Yithemes
 * @package YITH WooCommerce Gift Cards
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$date_format = apply_filters('yith_wcgc_date_format','Y-m-d');

global $product;

$is_gift_this_product = !($product instanceof WC_Product_Gift_Card);

?>

<div class="section-delivery-date" id="delivery-date">
	<div class="gift-inner-container">

		<h2 class="step-title"> <?php _e( 'Step 2 of 3', 'cafe_leather'); ?> </h2>
		<h3 class="ywgc_delivery_info_title"> <?php _e( 'Pick The Delivery Date', 'cafe_leather'); ?> </h3>

		<?php if ( $allow_send_later ) : ?>
			<div class="ywgc-postdated">
				<label for="ywgc-delivery-date"> <?php _e( 'Which day would you like us to email the digital gift card?', 'cafe_leather'); ?> </label>
				<input type="hidden" id="ywgc-delivery-date" value="<?php echo date("d/m/Y"); ?>" name="ywgc-delivery-date" placeholder="<?php echo apply_filters( 'ywgc_choose_delivery_date_placeholder', sprintf( esc_html__("Now" , 'yith-woocommerce-gift-cards' ) ) ) ; ?>" class="datepicker" > 
				<div id="ywgc-delivery-datee" class="datepicker"></div>
			</div>
		<?php endif; ?>

	</div>	
</div>


<div class="section-where-going" id="where-going">

	<div class="gift-inner-container">

		<h2 class="step-title">  <?php _e( 'Step 3 of 3', 'cafe_leather'); ?> </h2>
		<h3 class="ywgc_recipient_info_title">  <?php _e( 'Where’s This One Going?', 'cafe_leather'); ?> </h3>

		<div class="ywgc-single-recipient">

			<?php if ( 'yes' == get_option('ywgc_ask_sender_name', 'yes') ) : ?>
				<h5 class="ywgc-sender-info-title">
					<?php echo get_option( 'ywgc_sender_info_title' , esc_html__( "YOUR INFO", 'yith-woocommerce-gift-cards') ); ;?>
				</h5>
				<div class="ywgc-sender-name">
					<input type="text" name="ywgc-sender-name" id="ywgc-sender-name" value="<?php echo apply_filters('ywgc_sender_name_value','') ?>"
						placeholder="<?php _e( "Enter your name", 'yith-woocommerce-gift-cards' ); ?>">
				</div>
			<?php endif; ?>

			<div class="ywgc-recipient-name">
				<input type="text" id="ywgc-recipient-name" name="ywgc-recipient-name[]" placeholder="<?php _e( "Enter the recipient's name", 'yith-woocommerce-gift-cards' ); ?>" <?php echo ( $mandatory_recipient && ! $is_gift_this_product ) ? 'required' : ''; ?> class="yith_wc_gift_card_input_recipient_details">
			</div>

			<div class="ywgc-recipient-email">
				<input type="email" id="ywgc-recipient-email" name="ywgc-recipient-email[]" <?php echo ( $mandatory_recipient && ! $is_gift_this_product ) ? 'required' : ''; ?>
					class="ywgc-recipient yith_wc_gift_card_input_recipient_details" placeholder="<?php _e( "Enter the recipient's email address", 'yith-woocommerce-gift-cards' ); ?>"/>
			</div>
		</div>

		<?php if ( ! $mandatory_recipient ): ?>
			<span class="ywgc-empty-recipient-note"><?php echo apply_filters( 'ywgc_empty_recipient_note', esc_html__( "If empty, will be sent to your email address", 'yith-woocommerce-gift-cards' ) ); ?></span>
		<?php endif; ?>

		<?php if ( $allow_multiple_recipients ) : ?>
			<a href="#" class="add-recipient" id="add_recipient"><?php _e( "+ add another recipient", 'yith-woocommerce-gift-cards' ); ?></a>
		<?php endif; ?>


		<div class="ywgc-message">
			<textarea id="ywgc-edit-message" name="ywgc-edit-message" rows="5" placeholder=" <?php _e( 'Enter a message for the recipient', 'cafe_leather'); ?>"> </textarea>
		</div>

		<?php if ( 'yes' == get_option('ywgc_delivery_notify_customer', 'no') && 'yes' == get_option('ywgc_delivery_notify_customer_checkbox', 'no') ) : ?>
			<div class="ywgc-delivery-notification-checkbox-container">
				<input type="checkbox" id="ywgc-delivery-notification-checkbox" name="ywgc-delivery-notification-checkbox">
				<label for="ywgc-delivery-notification-checkbox"><?php echo apply_filters('ywgc_edit_delivery_notification_label',esc_html__( "Check to receive an email when the gift card has been sent to the recipient", 'yith-woocommerce-gift-cards' )); ?></label>
			</div>
		<?php endif; ?>


	</div>
</div>