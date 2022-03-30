<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;


    /**
     * My Account navigation.
     *
     * @since 2.6.0
     */


    do_action( 'woocommerce_account_navigation' ); ?>

    <div class="woocommerce-MyAccount-content">
        <?php
            /**
             * My Account content.
             *
             * @since 2.6.0
             */
            do_action( 'woocommerce_account_content' );	?>
    </div>

    <section class="changelog">
        <h2 class="h2-news"><?php echo __("News Feed", 'cafe_leather'); ?></h2>

        <div class="slide-feed">
            <article>
                <figure>
                    <img alt="Headshot of John Zurbach" srcset="/wp-content/uploads/2021/09/jake.jpg" data-srcset="/wp-content/uploads/2021/09/jake.jpg" class=" lazyloaded" style="">
                    <figcaption>
                        <span class="author"><?php echo __("ANDREA B.", 'cafe_leather');  ?> </span>
                        <span class="position"><?php echo __("Customer Experience", 'cafe_leather');  ?></span>
                    </figcaption>
                </figure>
                <div>
                    <p><?php echo __("We understand that shopping online can be unpredictable, but we got your back. With our free returns and exchanges, you wont have to worry for nothing. Please, do not hesitate to contact us if you have any questions about sizing or materials, we will be more than happy to help.", 'cafe_leather');  ?></p>
                    <p><a href="/workshop"><?php echo __("REACH OUT", 'cafe_leather'); ?></a></p>
                </div>
            </article>

            <article>
                <figure>
                    <img alt="Headshot of Christopher Leslie" srcset="/wp-content/uploads/2021/09/matheus.jpg" data-srcset="/wp-content/uploads/2021/09/matheus.jpg" class=" lazyloaded" style="">
                    <figcaption>
                        <span class="author"><?php echo __("SAMANTHA H.", 'cafe_leather'); ?> </span>
                        <span class="position"><?php echo __("Marketing", 'cafe_leather');  ?></span>
                    </figcaption>
                </figure>
                <div>
                    <p><?php echo __("Thanks for subscribing! Do not forget that you got 15% OFF your first purchase. Check your email, you should have received your discount code.", 'cafe_leather');  ?></p>
                    <p><a href="/help" class="chat-expand snap-close"><?php echo __("REGISTER NOW", 'cafe_leather');  ?></a></p>
                </div>
            </article>

            <article>
                <figure>
                    <img alt="Headshot of Wilton Gorske" srcset="/wp-content/uploads/2021/09/miguel.jpg" data-srcset="/wp-content/uploads/2021/09/miguel.jpg" class=" lazyloaded" style="">
                    <figcaption>
                        <span class="author"><?php echo __("MIGUEL S.", 'cafe_leather');  ?></span>
                        <span class="position"><?php echo __("Founder & CEO", 'cafe_leather');  ?></span>
                    </figcaption>
                </figure>
                <div>
                    <p><?php echo __("At Café we try to bring back old good traditions. That oldfashion way to do things when time was slower and the products were made to last a lifetime. Reimagined essencials to pass from generation to generation, focused principally on the best artisan hands and the best respectfull raw materials, always pledging to minimize to Zero our environment impact.", 'cafe_leather');  ?></p>
                    <p><a href="/?signup=1" class="popupTrigger"><?php echo __("LEARN MORE", 'cafe_leather');  ?></a></p>
                </div>
            </article>
            
            <article>
                <figure>
                    <img alt="Headshot of Nick Kemp" srcset="/wp-content/uploads/2021/09/jorge.jpg" data-srcset="/wp-content/uploads/2021/09/matheus.jpg" class=" lazyloaded" style="">
                    <figcaption>
                        <span class="author"><?php echo __("JORGE S.", 'cafe_leather');  ?> </span>
                        <span class="position"><?php echo __("COO", 'cafe_leather');  ?></span>
                    </figcaption>
                    </figure>
                    <div>
                        <p><?php echo __("For us, our customers are the center of everything we do. We believe in a different level of customer satisfaction, something that today is hard to find and that we believe is the most important part of our brand. That's why we created the Café Club! Sign up for an account and get 5% back on all purchases. Get rewards, track your purchases and receive early access to new products and promotions.", 'cafe_leather');  ?></p>
                        <p><a href="/about"><?php echo __("JOIN THE CLUB", 'cafe_leather');  ?></a></p>
                    </div>
            </article>
        </div>
    </section>

</div>