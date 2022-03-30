<?php


function sizeguide_register_post_type() {
     
    // size-guide
    $labels = array( 
            'name' => __( 'Size Guides' , 'cafe-size-guide' ),
            'singular_name' => __( 'Size Guide' , 'cafe-size-guide' ),
            'add_new' => __( 'New Size Guide' , 'cafe-size-guide' ),
            'add_new_item' => __( 'Add New Size Guide' , 'cafe-size-guide' ),
            'edit_item' => __( 'Edit Size Guide' , 'cafe-size-guide' ),
            'new_item' => __( 'New Size Guide' , 'cafe-size-guide' ),
            'view_item' => __( 'View Size Guide' , 'cafe-size-guide' ),
            'search_items' => __( 'Search Size Guides' , 'cafe-size-guide' ),
            'not_found' =>  __( 'No Size Guides Found' , 'cafe-size-guide' ),
            'not_found_in_trash' => __( 'No Size Guides found in Trash' , 'cafe-size-guide' ),
    );
    $args = array(
            'labels' => $labels,
            'has_archive' => true,
            'public' => true,
            'hierarchical' => false,
            'supports' => array(
                    'title', 
                    'editor', 
                    'excerpt', 
                    'custom-fields', 
                    'thumbnail',
                    'page-attributes'
            ),
            'rewrite'   => array( 'slug' => 'size-guide' ),
            'show_in_rest' => true

    );
    register_post_type( 'cafe_size_guide', $args );                
}
add_action( 'init', 'sizeguide_register_post_type' );