<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

function cafe_custom_menu() {
	# Mega menu
    register_nav_menu('mega-menu',__( 'Mega menu' ));
	# Menu archive sticky
	register_nav_menu('menu-archive',__( 'Menu archive sticky' ));
	# Café about menu
	register_nav_menu('cafe-about-menu',__( 'About Menu' ));
}
add_action( 'init', 'cafe_custom_menu' );