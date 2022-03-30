<?php
/**
 * Email for customer notification of gift card recevied
 *
 * @author YITHEMES
 * @package yith-woocommerce-gift-cards-premium\templates\emails
 */

    if ( !defined ( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    wc_get_template( 'emails/email-header-giftcard.php', array( 'email_heading' => $email_heading ) ) ; 

    $order_id = $gift_card->order_id;
    $pedido = wc_get_order( $order_id );
    $languaje = $pedido->get_meta("wpml_language");

    $recipient = $gift_card->recipient;
   
?>

<!-- INGLÉS -->
<?php if ($languaje === 'en') : ?>
    <div style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/pattern-bg.png');">   
        <img style="display:block;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/delivered-header-email-EN.jpg" alt="Your gift card has been delivered.">
        <img style="display:block;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/giftcard.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <div style="padding: 0 40px 70px !important; text-align: center;">
            <font size="20" face="Playfair Display" color="#636363" style="margin: 0 auto; font-family: 'Playfair Display',serif;color: #636363;font-size: 20px;line-height: 1.3em;width: 70%;"> Your gift card has been successfully <br> delivered to <br> <?php echo "<a style='color: #636363; text-decoration: none' href='mailto:$recipient'> $recipient </a>" ?> </font>
        </div>
        <img style="display:block; margin-rigth: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/bottom-card.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <div style="padding: 70px 40px; text-align: center;">
            <font size="20" face="Playfair Display" color="#636363" style="margin: 0; color: #636363; font-family: 'Playfair Display',serif; font-size: 20px; line-height: 1.3em;"> Thanks again for choosing Café! <br> We wish you all the best. </font>
        </div>
        <img style="display: block; margin-rigth: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/footer-delivered.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    </div>

<!-- ESPAÑOL -->
<?php else: ?>
    <div style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/pattern-bg.png');">        
        <img style="display:block;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/delivered-header-email-ES.jpg" alt="Tu tarjeta de regalo ha sido entregada.">
        <img style="display:block;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/giftcard.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <div style="padding: 0 40px 70px !important; text-align: center;">
            <font size="20" face="Playfair Display" color="#636363" style="margin: 0 auto; font-family: 'Playfair Display',serif;color: #636363;font-size: 20px;line-height: 1.3em;width: 70%;"> Tu tarjeta de regalo se ha enviado <br> correctamente a <br> <?php echo "<a style='color: #636363; text-decoration: none' href='mailto:$recipient'> $recipient </a>" ?>  </font>
        </div>
        <img style="display: block; margin-rigth: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/bottom-card.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <div style="padding: 70px 40px; text-align: center;">
            <font size="20" face="Playfair Display" color="#636363" style="margin: 0; color: #636363; font-family: 'Playfair Display',serif; font-size: 20px; line-height: 1.3em;"> Gracias de nuevo por elegir Café! <br> Te deseamos todo lo mejor. </font>
        </div>
        <img style="display: block; margin-rigth: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/footer-delivered.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    </div>
<?php endif ?>

<?php wc_get_template( 'emails/email-footer-giftcard.php') ; ?>