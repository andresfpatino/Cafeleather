<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function register_sidebar_cafeleather(){

    register_sidebar(array(
        "name" => "Mega menu",
        "id" => "sidebar-mega-menu",
        "descripcion" => "Sidebar used to show columns products in mega menu",
        "before_widget" => "<div id='%s' class='sidebar-mega-menu'>",
        "after_widget" => "</div>",
        "before_title" => "<h2 class='title'>",
        "after_title" => "</h2>"
    ));

    register_sidebar(array(
        'name' => 'Logos footer',
        "id" => "sidebar-logos-footer",
        "descripcion" => "Sidebar used to show logos in slider",
        'before_widget' => '<div class="logos-footer">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
}
add_action('widgets_init','register_sidebar_cafeleather');
