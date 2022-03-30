<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

wp_nav_menu( array(
    'theme_location' => 'menu-archive',
    'container' 	=> false,
    'menu_class'=>'categories'
) ); 
			