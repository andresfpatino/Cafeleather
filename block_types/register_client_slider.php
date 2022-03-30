<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

acf_register_block_type(
    array(
        'name'              => 'Client Slider',
        'title'             => __('Client Slider'),
        'description'       => __('custom Client Slider for Café Leather.'),
        'align' 			=> false,
        'render_template'   => 'template-parts/blocks/client_slider/client_slider.php',
        'category'          => 'cafe_leather_category',
       	'icon'              => 'admin-comments',
        'keywords'          => array( 'Clients', 'Client', 'Slider', 'Carrousell' ),
        'enqueue_assets' 	=> function(){
			// wp_enqueue_style( 'slickcss', get_stylesheet_directory_uri() . '/template-parts/blocks/client_slider/slick/slick.css', array(), "1.8.1", 'all' );
            // wp_enqueue_style( 'slicktheme', get_stylesheet_directory_uri() . '/template-parts/blocks/client_slider/slick/slick-theme.css', array(), "1.8.1", 'all' );
            wp_enqueue_style( 'client_slidercss', get_stylesheet_directory_uri() . '/template-parts/blocks/client_slider/client_slider.css', array(), "1.0", 'all' );
			// wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/template-parts/blocks/client_slider/slick/slick.min.js', array('jquery'), "1.8.1", true );
			wp_enqueue_script( 'client_sliderjs', get_stylesheet_directory_uri() . '/template-parts/blocks/client_slider/client_slider.js', array('jquery'), "1.0", true );
        }
    )
);