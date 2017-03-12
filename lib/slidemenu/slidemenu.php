<?php

/*
  Feature Name: slidemenu
  Usage: Slide out mobile menu styling with accordion nesting for submenu items.
  Version: 1.0.0
  Author: D4 Adv. Media
  License: GPL2
*/

global $d4pizza_version;

// Register and enqueue font-end plugin style sheets and scripts.
add_action( 'wp_enqueue_scripts', 'register_d4slidemenu_elements' );
function register_d4slidemenu_elements() {
	wp_register_style( 'slidemenu', plugins_url( 'd4-slidemenu.css' , __FILE__ ), '', $d4pizza_version );
	wp_enqueue_style( 'slidemenu' );
	wp_register_script( 'slidemenu', plugins_url( 'd4-slidemenu.js' , __FILE__ ), array( "jquery" ), $d4pizza_version, true );
	wp_enqueue_script('slidemenu');
}

include 'functions_slidemenu.php';