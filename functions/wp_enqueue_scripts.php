<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function enqueue_child_styles() {			
	// CSS
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'swiper-style', get_stylesheet_directory_uri() . '/assets/swiper/swiper.min.css', array(), "5.4.5", 'all' );
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/assets/slick/slick.css', array(), "1.8.1", 'all' );
	wp_enqueue_style( 'slicktheme', get_stylesheet_directory_uri() . '/assets/slick/slick-theme.css', array(), "1.8.1", 'all' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');		
	wp_enqueue_style( 'cafe-css', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), "1.0", 'all' );
	
	// JS
	wp_enqueue_script( 'swiper-js', get_stylesheet_directory_uri() . '/assets/swiper/swiper.min.js', array('jquery'), "5.4.5", true );
	wp_enqueue_script('masonry-js', get_stylesheet_directory_uri() . '/assets/js/masonry.min.js', array('jquery'), "4.2.2", true);
	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), "1.8.1", true );
	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), "1.0", true );	
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 9999);