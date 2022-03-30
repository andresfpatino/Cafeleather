<?php 

if ( ! defined( 'ABSPATH' ) ) exit;


function cafe_block_categories( $categories ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'cafe_leather_category',
                'title' => __( 'Café Leater Custom Blocks', 'cafe_leather' ),
                'icon'  => 'welcome-widgets-menus', 
            ),
        )
    );
  }
  add_filter( 'block_categories', 'cafe_block_categories', 10, 2 );
  