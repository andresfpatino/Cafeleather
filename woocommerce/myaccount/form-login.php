<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>
	
<?php if ( 1 ) : ?>
	
<div class="container-cl">
    <div class="u-columns col2-set" id="customer_login">

        <div id="login-page">	
            <p id="title-login"><?php echo __('Log In', 'hongo-child'); ?></p>
            <p id="text-login"><?php echo __('Want to earn more Café Club credits? Use the referral link in your account to invite a friend to make their first purchase at Cafeleather. Once they do, we’ll throw $10 worth of credit into your account.', 'hongo-child'); ?></p>
        </div>


        <div class="u-column1 col-1 login-form">
            <?php else : ?>        
            <div class="hongo-myaccount-without-register">
                <?php endif; ?>
                <h4 class="alt-font title-form login-click actives"><?php esc_html_e( 'Login', 'hongo-child' ); ?></h4>
                <h4 class="alt-font title-form register-click"><?php esc_html_e( 'Register', 'hongo-child' ); ?></h4>
                <form class="woocommerce-form woocommerce-form-login login" method="post">
                    <?php do_action( 'woocommerce_login_form_start' ); ?>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username"><?php esc_html_e( 'Username or email address', 'hongo-child' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password"><?php esc_html_e( 'Password', 'hongo-child' ); ?>&nbsp;<span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
                    </p>
                    <?php do_action( 'woocommerce_login_form' ); ?>
                    <p class="form-row">
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'hongo-child' ); ?></span>
                        </label>
                        <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                        <button type="submit" class="woocommerce-button btn-full btn btn-medium woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'hongo-child' ); ?>"><?php esc_html_e( 'Log in', 'hongo-child' ); ?></button>
                    </p>
                    <p class="woocommerce-LostPassword lost_password alt-font">
                        <a class="btn-link btn-medium font-weight-500" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'hongo-child' ); ?></a>
                    </p>
                    <?php do_action( 'woocommerce_login_form_end' ); ?>
                </form>

                <?php if ( 1 ) :                 
                    if ( ICL_LANGUAGE_CODE=='es' ) {                                        
                        $classr = "block-register-es";
                    }else{
                        $classr = "block-register-en"; 
                    
                    }             
                ?>

            </div>
        </div>	


        <div class="u-columns col2-set register-form" style="display:none">
            <div id="block-register" class="<?php echo $classr ?>">
                <p id="title-login"><?php echo __('Sign Up', 'hongo-child'); ?></p>
                <p id="text-login"><?php echo __('Register to join The Café Club—our commitment to keeping our customers at the center of everything we do. Earn credit on purchases, get early access to promotions, limited stock, and sales as well as member-only exclusive offers.', 'hongo-child'); ?></p>
            </div>	
            <div class="u-column1 col-1 register-content">
                <h4 class="alt-font title-form login-click"><?php esc_html_e( 'Login', 'hongo-child' ); ?></h4>
                <h4 class="alt-font title-form register-click"><?php esc_html_e( 'Register', 'hongo-child' ); ?></h4>

                <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
                    <?php do_action( 'woocommerce_register_form_start' ); ?>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_username"><?php esc_html_e( 'Username', 'hongo-child' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_email"><?php esc_html_e( 'Email address', 'hongo-child' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                    </p>

                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_password"><?php esc_html_e( 'Password', 'hongo-child' ); ?>&nbsp;<span class="required">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                        </p>
                    <?php else : ?>
                        <p><?php esc_html_e( 'A password will be sent to your email address.', 'hongo-child' ); ?></p>
                    <?php endif; ?>

                    <?php do_action( 'woocommerce_register_form' ); ?>

                    <p class="woocommerce-form-row form-row">
                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        <button type="submit" class="woocommerce-Button btn-full btn btn-medium" name="register" value="<?php esc_attr_e( 'Register', 'hongo-child' ); ?>"><?php esc_html_e( 'Register', 'hongo-child' ); ?></button>
                    </p>

                    <?php do_action( 'woocommerce_register_form_end' ); ?>

                </form>
            </div>
        </div>

    </div>    
</div>

<?php else : ?>
	
</div><!--hongo-myaccount-without-register-->

<?php endif; ?>

<?php //do_action( 'woocommerce_after_customer_login_form' ); 


?>

<style>
	.inside-article {background-color: transparent !important;}
	.site-footer {display: none;}
	.btn-link:hover{border-bottom:2px solid #fff;color:#fff;text-decoration:none}
	.woocommerce-notices-wrapper{position:absolute;margin-top:12%;width:87%}
	.widget{display:none}
	.hongo-content-left-part{width:100%}
	#colophon{display:none}
	body{background-image:linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.2)),url('/wp-content/uploads/2021/09/Plantas-Fondo-Espacio-Cliente-scaled.jpg');min-height:100%;background-repeat:no-repeat;background-size:cover}
	.woocommerce-account .woocommerce table.my_account_orders,.woocommerce-account{padding:0!important}
	body .hongo-main-content-wrap{background-color:transparent!important;min-height:748px}
	.bar_black_footer{width:102%!important;margin-left:-1.5%!important}
	.login{padding-right:5.85rem!important}	
	.login-click{display:inline-block;margin-left:52px;cursor:pointer;width: 62px;font-size: 15px;font-family: 'Montserrat';margin: 0;}		
	.register-click{font-size: 15px;margin-left:52px;display:inline-block;cursor:pointer;font-family: 'Montserrat';}	
	
	.login-form{margin-top:-2px; width: 50%;}	
	.register{margin-top:-46px!important}
	.register-form{top:240px;font-size:0;display:flex;margin:0 auto;position:relative}	
	#login-page{width: 50%;}
	#customer_login{margin-top:240px;width: 100% !important;display: flex;flex-wrap: wrap;}	
	#title-login{line-height:1;color:#fff!important;text-align:left;font-size: 45px;font-family: 'Playfair Display';margin: 0px 0 30px;}	
	#text-login{line-height:1.4444444444;color:#fff!important;text-align:left;font-size: 18px;font-family: 'Playfair Display';width: 85%;}	
	.block-register-en{width:50%;display:inline-block}
	.block-register-es{width:50%;display:inline-block}	
	.woocommerce form.register{width:84%}
	.register-content{width:48%!important;display:inline-block}
	.woocommerce form .form-row{margin:0!important}
	.woocommerce form .form-row .input-checkbox{margin:16px 8px 0 0}
	.woocommerce form.login,.woocommerce form.register{border:none;color:#fff!important;}
	.woocommerce-form-login.login { margin-top: -47px !important;}
	.woocommerce-form-login{background-color:transparent!important;border:none!important;color:#fff!important}	
	woocommerce form .form-row label,label{color:#fff!important;display:block!important;margin-top:1.5rem!important;margin-bottom:1rem!important;font-family:'Montserrat'!important;font-weight:600!important;font-style:normal!important;letter-spacing:.14em!important;font-size:13px!important;text-transform:uppercase!important;text-shadow:-2px 2px 2px #000}	
	.title-form{margin-bottom: 60px;color:#fff;font-weight:700;text-transform:uppercase;border-bottom: 2px solid transparent;}	
	.actives{border-color:#fff}	
	.woocommerce-privacy-policy-text{line-height:14px!important;font-size:10px!important;top:10px;position:relative}
	.woocommerce-privacy-policy-text a {color: #fff; margin-bottom: 20px;display: block;}
	.woocommerce-form__label-for-checkbox{position:relative;top:14px}
	.woocommerce-form__label-for-checkbox span { font-size: 12px; font-family: 'Montserrat'; margin: 0 20px 25px; display: block;}	
	.woocommerce-Button{color:#363636!important;background-color:#b5aa8f!important;border:none}
	.woocommerce-Button:hover{color:#363636!important;background-color:#f2f2f2!important;border:none}	
	.woocommerce-form-login__submit{color:#363636!important;background-color:#b5aa8f!important;border:none;display: block;width: 100%;margin: 20px 0;text-transform: uppercase;font-weight: 600;font-family: 'Montserrat'; font-size: 14px;}
	.woocommerce-form-login__submit:hover{color:#363636!important;background-color:#f2f2f2!important;border:none}	
	.btn.btn-medium{padding:11px 25px}
	label[for=mailchimp_woocommerce_newsletter]{display:inline-block!important;width:80%;margin:0!important}
	#rememberme{margin-top:0!important;margin-bottom:30px}
	.btn-link{color:#ffff}	
	.woocommerce .woocommerce-form-login .woocommerce-form-login__rememberme {margin: 10px 0 !important;}
	.woocommerce-form-login__rememberme span {    display: inline-block;}
	.lost_password {text-align: right;}
	.lost_password a {text-decoration: none; font-size: 14px;}	
	.woocommerce-Button {display: block;width: 100%;font-weight: 600;text-transform: uppercase;}
	@media only screen and (max-width: 1500px) {
		body{background-size:auto!important}
	}
	@media only screen and (max-width: 990px) {
		body{background-size:auto!important}
		#login-page{display:none}
		#customer_login{margin-top:110px;width:100%;margin-left:5%}
		.register-content{width:100%!important}
		.block-register-en{display:none}
		.block-register-es{display:none}
		.woocommerce form.register{width:92%}
		.login-click{margin-left:22px!important}
		.register-form{top:110px;width:100%!important;margin-left:5%}
		.register{margin-top:-30px!important}
		.login{padding-right:4.85rem!important}
		.woocommerce form.login,.woocommerce form.register{border:none;color:#fff!important;margin:-24px 0 0}
	}
	.woocommerce-Input{font-size:14px}
	@media only screen and (max-width: 990px) {
		.woocommerce-notices-wrapper{top:17%!important;width:90%;margin-left:2%;position:sticky}
	}

</style>	

