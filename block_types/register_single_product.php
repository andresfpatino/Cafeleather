<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

acf_register_block_type(
    array(
        'name'              => 'Single product',
        'title'             => __('Single product'),
        'description'       => __('Single product for Café Leather.'),
        'align' 			=> false,
        'render_template'   => 'template-parts/blocks/single_product/single_product.php',
        'category'          => 'cafe_leather_category',
        'icon'              => 'products',
        'keywords'          => array( 'Single', 'Product' ),
        'enqueue_assets' 	=> function(){
            wp_enqueue_style( 'block_single_product', get_stylesheet_directory_uri() . '/template-parts/blocks/single_product/single_product.css', array(), "1.0", 'all' );
        }
    )
);