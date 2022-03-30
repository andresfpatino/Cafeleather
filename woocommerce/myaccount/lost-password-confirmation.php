<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit; ?>

<div class="nm-myaccount-lost-reset-password">
    
    <?php
        wc_print_notices();        
        wc_print_notice( esc_html__( 'Password reset email has been sent.', 'woocommerce' ) );
    ?>

    <p><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', esc_html__( 'A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.', 'woocommerce' ) ) ); ?></p>
    
</div>


<style>
.nm-myaccount-lost-reset-password{margin-top:20%}
@media only screen and (max-width: 990px) {
    .nm-myaccount-lost-reset-password{margin-top:50%}
}
.nm-myaccount-lost-reset-password p{font-size:1.8rem;line-height:1.4444444444;color:#fff!important;text-align:left;font-family:Chronicle;width:90%}
body{background-image:linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.2)),url('/wp-content/uploads/2021/09/Plantas-Fondo-Espacio-Cliente-scaled.jpg');min-height:100%;background-repeat:no-repeat;background-size:cover}
body .hongo-main-content-wrap{background-color:transparent!important;min-height:748px}
.woocommerce-notices-wrapper{position:absolute;margin-top:12%!important;width:87%}
@media only screen and (max-width: 990px) {
    .woocommerce-notices-wrapper{top:15%!important;width:90%;margin-left:2%;position:sticky}
}
</style>    