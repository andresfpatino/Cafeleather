<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); 


/**
 * generate_before_main_content hook.
 *
 * @since 0.1
 */
do_action( 'generate_before_main_content' ); ?>

    <h2><?php _e( "Sometimes getting lost is not so bad", 'cafe_leather' ); ?></h2>
    <p><?php _e( "but the page you were looking for can’t be found, so let's go back home.", 'cafe_leather' ); ?></p>
    <?php get_search_form(); ?>
    <a class="goback" href="<?php echo get_home_url(); ?>"> <?php _e( "Go back home", 'cafe_leather' ); ?></a>

<?php
/**
 * generate_after_main_content hook.
 *
 * @since 0.1
 */
do_action( 'generate_after_main_content' );


get_footer();
