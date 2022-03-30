<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'generate_navigation_search_output', function() {
    printf(  
        '<form method="get" class="search-form navigation-search" action="%1$s">
            <input type="search" class="search-field" placeholder="Enter your search" value="%2$s" name="s" title="%3$s" />
            <input type="hidden" name="post_type" value="product" />
        </form>', 
        esc_url( home_url( '/' ) ), 
        esc_attr( get_search_query() ),   
        esc_attr_x( 'Search', 'label', 'generatepress' ) 
    ); 
});