<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>

<form method="post" class="woocommerce-ResetPassword lost_reset_password">

	<p><?php echo apply_filters( 'woocommerce_reset_password_message', esc_html__( 'Enter a new password below.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

	<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<label for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_1" id="password_1" autocomplete="new-password" />
	</p>
	<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<label for="password_2"><?php esc_html_e( 'Re-enter new password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password_2" id="password_2" autocomplete="new-password" />
	</p>

	<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
	<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

	<div class="clear"></div>

	<?php do_action( 'woocommerce_resetpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>"><?php esc_html_e( 'Save', 'woocommerce' ); ?></button>
	</p>

	<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>

</form>


<style>
    .woocommerce form .form-row{padding:0;margin:0 0 25px;width:100%}
    .woocommerce form.lost_reset_password,.woocommerce form.lost_reset_password{border:none}
    .button,.woocommerce button.button,.woocommerce-Button{background-color:#bc9b6d!important;color:#fff!important;border:none}
    .button:hover,.woocommerce button.button:hover,.woocommerce-Button:hover{background-color:#9d7b4c!important;color:#fff!important;border:none}
    .woocommerce-ResetPassword{margin-top:-.5em;font-size:3rem;line-height:1;color:#fff!important;text-align:left;font-family:Chronicle}
    label{font-size:1.8rem;line-height:1.4444444444;color:#fff!important;text-align:left;font-family:Chronicle;width:80%}
    .woocommerce-ResetPassword{margin-top:15%!important}
    @media only screen and (max-width: 990px) {
        .woocommerce-ResetPassword{margin-top:40%!important}
    }
    body{background-image:linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.2)),url('/wp-content/uploads/2021/09/Plantas-Fondo-Espacio-Cliente-scaled.jpg');min-height:100%;background-repeat:no-repeat;background-size:cover}
    body .hongo-main-content-wrap{background-color:transparent!important;min-height:748px}
    .woocommerce-notices-wrapper{position:absolute;margin-top:12%!important;width:100%}
    @media only screen and (max-width: 990px) {
        .woocommerce-notices-wrapper{top:15%!important;width:90%;margin-left:2%;position:sticky}
    }
</style>

<?php
do_action( 'woocommerce_after_reset_password_form' );
