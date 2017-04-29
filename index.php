<?php
/*
	Plugin Name: D4 Pizza
	Plugin URI: https://github.com/d4advancedmedia/d4-pizza
	GitHub Plugin URI: https://github.com/d4advancedmedia/d4-pizza
	GitHub Branch: master
	Description: Every site needs extra cheese, robust sauce, toppings, and choice of dipping sauce.
	Version: 2.0.0
	Author: D4 Adv. Media
	License: GPL3
*/
// Automatically grabs the plugin's version number
	function plugin_get_version() {
		if ( ! function_exists( 'get_plugins' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
		$plugin_file = basename( ( __FILE__ ) );
		return $plugin_folder[$plugin_file]['Version'];
	} $d4pizza_version = plugin_get_version();

// adds the toppings
	function d4pizza_include_toppings() {

		$d4toppings = apply_filters( 'd4toppings', array() );
		set_include_path( plugin_basename(dirname( __FILE__ )) ); 

		#var_dump( $d4toppings );
		foreach ( $d4toppings as $key => $value ) {

			if ( $value == true ) {
				require_once ( "lib/{$key}/{$key}.php" );
			}

		}
		#restore_include_path();

	} add_action( 'plugins_loaded', 'd4pizza_include_toppings' );



?>