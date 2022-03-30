<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
$text_lost = __('Lost your password?', 'hongo-child');
$text_lost_p = __(' Please enter your username or email address. You will receive a link to create a new password via email.', 'hongo-child');

?>

<div class="block_lost">
    <div class="text_lost">
       <p id="title-login"><?php echo $text_lost ?></p>
		<p id="text-login"><?php echo $text_lost_p ?></p>
    </div>
    <div class="text_form">
        <form method="post" class="woocommerce-ResetPassword lost_reset_password">

            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                <label for="user_login"><?php esc_html_e( 'Username or email', 'hongo' ); ?></label>
                <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
            </p>

            <div class="clear"></div>

            <?php do_action( 'woocommerce_lostpassword_form' ); ?>

            <p class="woocommerce-form-row form-row">
                <input type="hidden" name="wc_reset_password" value="true" />
                <button type="submit" class="woocommerce-Button btn-full btn btn-medium" value="<?php esc_attr_e( 'Reset password', 'hongo' ); ?>"><?php esc_html_e( 'Reset password', 'hongo' ); ?></button>
            </p>

            <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

        </form>
    </div>
</div>


<style>
    .woocommerce-notices-wrapper{position:absolute;margin-top:12%!important;width:87%}
    .block_lost{font-size:0;margin:21% 3% 0}
    .text_lost{width:50%;display:inline-block}
    .text_form{width:50%;display:inline-block}
    #title-login{margin-top:-.5em;font-size:5rem;line-height:1;color:#fff!important;text-align:left;font-family:Chronicle}
    #text-login{font-size:1.8rem;line-height:1.4444444444;color:#fff!important;text-align:left;font-family:Chronicle;width:80%}
    .woocommerce{font-size:0px,}
    .bar_black_footer{width:106%!important;margin-left:-6%}
    .woocommerce form.lost_reset_password,.woocommerce form.lost_reset_password{width:65%;margin:0 auto;padding:0;border:none}
    .woocommerce-Button{background-color:#bc9b6d!important;color:#fff!important;border:none}
    .woocommerce-Button:hover{background-color:#9d7b4c!important;color:#fff!important;border:none}
    input,textarea,select,.form-control{border:1px solid #e8e8e8;color:#212121;font-weight:400;padding:4px 15px 5px;color:#000;font-size:1.8rem}
    .woocommerce-ResetPassword{font-family:Chronicle;color:#fff}
    #colophon{display:none}
    body{background-image:linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.2)),url('/wp-content/uploads/2021/09/Plantas-Fondo-Espacio-Cliente-scaled.jpg');min-height:100%;background-repeat:no-repeat;background-size:cover}
    .woocommerce-account .woocommerce table.my_account_orders,.woocommerce-account{padding:0!important}
    .woocommerce form .form-row label,label{font-weight:500;line-height:normal;margin-bottom:12px;color:#fff}
    body .hongo-main-content-wrap{background-color:transparent!important;min-height:748px}
    .bar_black_footer{width:101%!important;margin-left:-2.5%!important}
    @media only screen and (max-width: 1500px) {
        body{background-size:auto!important}
    }
    @media only screen and (max-width: 990px) {
        .text_lost{width:100%;display:block}
        .text_form{width:100%;display:block}
        .woocommerce form.lost_reset_password,.woocommerce form.lost_reset_password{width:100%}
        .woocommerce-notices-wrapper{top:11%!important;width:95%;margin-left:2%;position:sticky}
    }
</style>

<?php
do_action( 'woocommerce_after_lost_password_form' );

