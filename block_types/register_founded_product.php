<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

acf_register_block_type(
    array(
        'name'              => 'Banner founded products',
        'title'             => __('Banner founded products'),
        'description'       => __('custom Banner founded products for Café Leather.'),
        'align' 			=> false,
        'render_template'   => 'template-parts/blocks/founded_products/banner_founded_products.php',
        'category'          => 'cafe_leather_category',
        'icon'              => 'cart',
        'keywords'          => array( 'Founded', 'Café_lab', 'Products'),
        'enqueue_assets' 	=> function(){
            wp_enqueue_style( 'call_to_action', get_stylesheet_directory_uri() . '/template-parts/blocks/founded_products/banner_founded_products.css', array(), "1.0", 'all' );
        }
    )
);