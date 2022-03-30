<?php
/**
 * Send the gift card code email
 *
 * @author  Yithemes
 * @package hongo-child-premium\templates\emails
 */

    if ( !defined ( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    wc_get_template( 'emails/email-header-giftcard.php', array( 'email_heading' => $email_heading ) ) ;

    $sender = $gift_card->sender_name;
    $recipient = $gift_card->recipient_name;
    $message_gift = $gift_card->message;
    $cupon_number = $gift_card->gift_card_number;
    $amount = $gift_card->total_amount;

    $shop_page_url      = apply_filters( 'yith_ywgc_shop_page_url_qr', get_permalink( wc_get_page_id( 'checkout' ) ) ? get_permalink( wc_get_page_id( 'checkout' ) ) : site_url() );
    $apply_discount_url = $shop_page_url . '?ywcgc-add-discount=' . $cupon_number . '%26ywcgc-verify-code=' . YITH_YWGC()->hash_gift_card( $object );

    $order_id = $gift_card->order_id;
    $pedido = wc_get_order( $order_id );
    $languaje = $pedido->get_meta("wpml_language");

?>

<!-- INGLÉS -->
<?php if ($languaje === 'en') : ?>
    <div style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/pattern-bg.png');">   
        <img style="display: block; margin-rigth: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/send-header-email-EN.png" alt="Someone very special sent you a gift!">

        <div bgcolor="#9e977a" style="background-color: #9e977a; padding: 80px 20px; text-align: center;">
            <font size="25" face="Playfair Display" color="#ededed" style="margin: 0 auto; font-family: 'Playfair Display',serif; color: #ededed; font-size: 25px; line-height: 1.2em;"> The manner of giving is worth more than the gift, but... lucky you!</font>
        </div>

        <img style="display:block;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/giftcard.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">

        <div style="padding: 0 20px 40px;">
            <font size="20" face="Montserrat" color="#636363" style="display: block; font-family: 'Montserrat', sans-serif; font-weight: 400; text-align: center; color: #636363; margin: 0 0 6px; font-size: 20px;"> Hi <?php echo $recipient; ?>.</font>
            <font size="20" face="Montserrat" color="#636363" style="display: block; font-family: 'Montserrat', sans-serif; font-weight: 400; text-align: center; color: #636363; margin: 0 0 6px; font-size: 20px;"> You just received a gift from </font>
            <font size="20" face="Montserrat" color="#636363" style="display: block; font-family: 'Montserrat', sans-serif; font-weight: 400; text-align: center; color: #636363; margin: 0 0 6px; font-size: 20px;"> <?php echo $sender; ?> </font>
        </div>

        <div bgcolor="#9e977a" style="background-color: #9e977a; padding: 40px 20px;">       
            <font size="15" face="Montserrat" color="#ededed" style="font-family: 'Montserrat', sans-serif;font-weight: 400;text-align: center;color: #ededed;margin: 0px auto;font-size: 15px;max-width: 500px;"> <?php echo $message_gift; ?></font>
        </div>

        <div style="padding: 40px 50px;">        
            <div style="padding: 25px 0px;">
                <font size="32" face="Montserrat" color="#636363" style="display: block; margin: 0 0 15px;text-align: center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #636363;font-size: 32px;"> <?php echo get_woocommerce_currency_symbol() . $amount; ?> </font>
                <font size="32" face="Montserrat" color="#636363" style="display: block; margin: 0;text-align: center;font-family: 'Montserrat', sans-serif;color: #636363;font-size: 22px;font-weight: 600;"> GIFT CARD VALUE </font>
            </div>
            <div style="padding: 25px 0px;">
                <font size="15" face="Montserrat" color="#636363" style="display: block; margin: 0;text-align: center;font-family: 'Montserrat', sans-serif;color: #636363;font-size: 15px;"> Apply your Gift Card Now </font>
                <a href=" <?php echo $apply_discount_url; ?> " style="text-decoration: none; color: #636363;font-family: 'Montserrat', sans-serif;text-align: center;display: block; border: 2px solid #636363;font-weight: 600;margin: 30px auto;max-width: 150px;padding: 6px 0px;"> APPLY NOW </a>
                <font size="15" face="Montserrat" color="#636363" style="display: block; margin: 0 0 15px;text-align: center;font-family: 'Montserrat', sans-serif;color: #636363;font-size: 15px;"> Or </font>
                <font size="15" face="Montserrat" color="#636363" style="display: block; margin: 0;text-align: center;font-family: 'Montserrat', sans-serif;color: #636363;font-size: 15px;"> Apply this code at your checkout </font>
                <span bgcolor="#9e9779" style="background-color: #9e9779;color: #ededed;text-align: center;max-width: 200px;padding: 15px 10px;font-size: 25px;display: block;margin: 25px auto 0;font-family: 'Montserrat', sans-serif;font-weight: 600;"> <?php echo $cupon_number; ?> </span>
            </div>
        </div>

        <img style="display: block; margin-rigth: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/bottom-card.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <img style="display: block; margin-rigth: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/spotify-EN.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    </div>





<!-- ESPAÑOL -->
<?php else: ?>      
    <div style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/pattern-bg.png');">   
        <img style="display: block; margin-right: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/send-header-email-ES.png" alt="Alguien muy especial te ha enviado a un regalo.">

        <div bgcolor="#9e977a" style="background-color: #9e977a; padding: 80px 20px; text-align: center;">
            <font size="25" face="Playfair Display" color="#ededed" style="display: block; margin: 0 auto; font-family: 'Playfair Display',serif; color: #ededed; font-size: 25px; line-height: 1.2em;"> La intención siempre vale más que el <br> propio regalo, pero ya que estamos...</font>
        </div>
        
        <img style="display:block;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/giftcard.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">

        <div style="padding: 0 20px 40px;">
            <font size="20" face="Montserrat" color="#636363" style="display: block; font-family: 'Montserrat', sans-serif; font-weight: 400; text-align: center; color: #636363; margin: 0 0 6px; font-size: 20px;"> Hola <?php echo $recipient; ?>.</font>
            <font size="20" face="Montserrat" color="#636363" style="display: block; font-family: 'Montserrat', sans-serif; font-weight: 400; text-align: center; color: #636363; margin: 0 0 6px; font-size: 20px;"> Haz recibido una Tarjeta Regalo de </font>
            <font size="20" face="Montserrat" color="#636363" style="display: block; font-family: 'Montserrat', sans-serif; font-weight: 400; text-align: center; color: #636363; margin: 0 0 6px; font-size: 20px;"> <?php echo $sender; ?> </font>
        </div>

        <div bgcolor="#9e977a" style="background-color: #9e977a; padding: 40px 20px;">
            <font size="15" face="Montserrat" color="#ededed" style="display: block; font-family: 'Montserrat', sans-serif;font-weight: 400;text-align: center;color: #ededed;margin: 0px auto;font-size: 15px;max-width: 500px;"> <?php echo $message_gift; ?></font>
        </div>

        <div style="padding: 40px 50px;">      
            <div style="padding: 25px 0px;">
                <font size="32" face="Montserrat" color="#636363" style="display: block; margin: 0 0 15px;text-align: center;font-family: 'Montserrat', sans-serif;font-weight: 600;color: #636363;font-size: 32px;"> <?php echo get_woocommerce_currency_symbol() . $amount; ?> </font>
                <font size="32" face="Montserrat" color="#636363" style="display: block; margin: 0;text-align: center;font-family: 'Montserrat', sans-serif;color: #636363;font-size: 22px;font-weight: 600;"> VALOR DE LA TARJETA REGALO </font>
            </div>
            <div style="padding: 25px 0px;">
                <font size="15" face="Montserrat" color="#636363" style="display: block; margin: 0;text-align: center;font-family: 'Montserrat', sans-serif;color: #636363;font-size: 15px;"> Usa tu tarjeta regalo ahora </font>
                <a href=" <?php echo $apply_discount_url; ?> " style="text-decoration: none; color: #636363;font-family: 'Montserrat', sans-serif;text-align: center;display: block; border: 2px solid #636363;font-weight: 600;margin: 30px auto;max-width: 150px;padding: 6px 0px;"> USAR AHORA </a>
                <font size="15" face="Montserrat" color="#636363" style="display: block; margin: 0 0 15px;text-align: center;font-family: 'Montserrat', sans-serif;color: #636363;font-size: 15px;"> O </font>
                <font size="15" face="Montserrat" color="#636363" style="display: block; margin: 0;text-align: center;font-family: 'Montserrat', sans-serif;color: #636363;font-size: 15px;"> Aplica este código en el checkout </font>
                <span bgcolor="#9e9779" style="background-color: #9e9779;color: #ededed;text-align: center;max-width: 200px;padding: 15px 10px;font-size: 25px;display: block;margin: 25px auto 0;font-family: 'Montserrat', sans-serif;font-weight: 600;"> <?php echo $cupon_number; ?> </span>
            </div>
        </div>

        <img style="display: block; margin-right: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/bottom-card.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        <img style="display: block; margin-right: 0px !important; padding-right: 0px !important;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/gift-card/spotify-ES.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    </div>
<?php endif ?>


<?php wc_get_template( 'emails/email-footer-giftcard.php') ; ?>