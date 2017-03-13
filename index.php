<?php
/*
	Plugin Name: D4 Pizza
	Plugin URI: https://github.com/d4advancedmedia/d4-pizza
	GitHub Plugin URI: https://github.com/d4advancedmedia/d4-pizza
	GitHub Branch: master
	Description: Every site needs extra cheese, robust sauce, toppings, and choice of dipping sauce.
	Version: 1.1.1
	Author: D4 Adv. Media
	License: GPL2
*/

// Update this version number in the description area as well for cache busting. Use this variable as the version number in registers for scripts and styles so that a single change to this number will force a version refresh for all D4 Pizza files. You can still version the js and css files separately, this just denotes the version of the plugin as a whole.
$d4pizza_version = '1.1.1';

//Plugin includes
include ('config.php');

global $d4pizza_config;

if (is_array($d4pizza_config)) {
	foreach ($d4pizza_config as $topping => $value) {
		if($value == true) {
			include ('lib/'.$topping.'/'.$topping.'.php');
		}
	}
}

?>