<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function style_christmas_gift_guide_template() {
    if ( is_page_template( 'template-christmas-gift-guide.php' ) ) {
      wp_enqueue_style( 'christmas-gift-guide', get_stylesheet_directory_uri() . '/assets/css/christmas-gift-guide.css' );
    }
  }
add_action( 'wp_enqueue_scripts', 'style_christmas_gift_guide_template');