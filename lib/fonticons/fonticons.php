<?php
/*
  Feature Name: fonticons
  Usage: Adds a modified version of fontawesome with a few other icon packs.
  Version: 1.0.0
  Author: D4 Adv. Media
  License: GPL2
*/



// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_d4fonticons' );

function register_d4fonticons() {
	wp_register_style( 'd4fonticons', plugins_url( 'd4-fonticons.css' , __FILE__ ) );
	wp_enqueue_style( 'd4fonticons' );
}

?>