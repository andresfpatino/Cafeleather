<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

acf_register_block_type(
    array(
        'name'              => 'Collection products',
        'title'             => __('Collection products'),
        'description'       => __('custom Collection products for Café Leather.'),
        'align' 			=> false,
        'render_template'   => 'template-parts/blocks/collection_products/collection_products.php',
        'category'          => 'cafe_leather_category',
        'icon'              => 'cart',
        'keywords'          => array( 'Collection', 'Shop', 'Categories', 'products' ),
        'enqueue_assets' 	=> function(){
            wp_enqueue_style( 'call_to_action', get_stylesheet_directory_uri() . '/template-parts/blocks/collection_products/collection_products.css', array(), "1.0", 'all' );
        }
    )
);