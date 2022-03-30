<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

acf_register_block_type(
    array(
        'name'              => 'Hero slider',
        'title'             => __('Hero slider'),
        'description'       => __('custom Hero slider for Café Leather.'),
        'align' 			=> false,
        'render_template'   => 'template-parts/blocks/hero_slider/hero_slider.php',
        'category'          => 'cafe_leather_category',
        'icon'              => 'image-flip-horizontal',
        'keywords'          => array( 'Hero', 'slider' ),
        'enqueue_assets' 	=> function(){
            // wp_enqueue_style( 'slickcss', get_stylesheet_directory_uri() . '/template-parts/blocks/hero_slider/slick/slick.css', array(), "1.8.1", 'all' );
            // wp_enqueue_style( 'slicktheme', get_stylesheet_directory_uri() . '/template-parts/blocks/hero_slider/slick/slick-theme.css', array(), "1.8.1", 'all' );
            wp_enqueue_style( 'hero_slidercss', get_stylesheet_directory_uri() . '/template-parts/blocks/hero_slider/hero_slider.css', array(), "1.0", 'all' );
            // wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/template-parts/blocks/hero_slider/slick/slick.min.js', array('jquery'), "1.8.1", true );
            wp_enqueue_script( 'hero_sliderjs', get_stylesheet_directory_uri() . '/template-parts/blocks/hero_slider/hero_slider.js', array('jquery'), "1.0", true );
        }
    )
);