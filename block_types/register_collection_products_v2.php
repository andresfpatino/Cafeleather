<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

acf_register_block_type(
    array(
        'name'              => 'Collection products V2',
        'title'             => __('Collection products V2'),
        'description'       => __('custom Collection products for Café Leather V2 (load ajax).'),
        'align' 			=> false,
        'render_template'   => 'template-parts/blocks/collection_products_v2/collection_products_v2.php',
        'category'          => 'cafe_leather_category',
        'icon'              => 'update',
        'keywords'          => array( 'Collection', 'Shop', 'Categories', 'products', 'load more', 'ajax' ),
        'enqueue_assets' 	=> function(){
            wp_enqueue_style( 'collection_productv2', get_stylesheet_directory_uri() . '/template-parts/blocks/collection_products/collection_products.css', array(), "1.0", 'all' );
            wp_enqueue_script( 'collection_productv2_js', get_stylesheet_directory_uri() . '/template-parts/blocks/collection_products_v2/collection_productv2.js', array('jquery'), "1.0", true );
        }
    )
);