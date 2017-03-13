<?php

/*
  Feature Name: reanimator
  Usage: Add classes to elements to create prebuilt animation effects.
  Version: 1.0.1
  Author: D4 Adv. Media
  License: GPL2
*/

global $d4pizza_version;

// Register and enqueue font-end plugin style sheets and scripts.
add_action( 'wp_enqueue_scripts', 'register_d4reanimator_elements' );
function register_d4reanimator_elements() {
	wp_register_style( 'reanimator', plugins_url( 'd4-reanimator.css' , __FILE__ ), '', $d4pizza_version );
	wp_enqueue_style( 'reanimator' );
	wp_register_script( 'reanimator', plugins_url( 'd4-reanimator.js' , __FILE__ ), array( "jquery" ), $d4pizza_version, true );
	wp_enqueue_script('reanimator');
}