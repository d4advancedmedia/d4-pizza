<?php

/*
  Shortcode Name: d4customsearch
  Usage: [d4customsearch posttype=""]
  Version: 1.0.0
  Author: D4 Adv. Media
  License: GPL2
*/

function shortcode_d4customsearch( $atts ) {
	$attr=shortcode_atts(array(
		'posttype'		=> '',
		'placeholder'	=> 'Search...',
	), $atts);

	if ($attr['posttype'] != '') {
		$posttype = '<input type="hidden" name="post_type" value="'.$attr['posttype'].'" />';
	}

	$placeholder = $attr['placeholder'];

	$output = '<form class="search-form" role="search" method="get" action="'.home_url( '/' ).'">';
	$output .= '<label>';
	$output .= '<span class="screenreader">Search for:</span>';
	$output .= '<input class="search-field" type="search" placeholder="'.$placeholder.'" value="" name="s" title="Search for:" />';
	$output .= $posttype;
	$output .= '</label>';
	$output .= '<input class="search-submit" type="submit" value="Search" />';
	$output .= '</form>';

	return $output;
}

add_shortcode( 'd4customsearch', 'shortcode_d4customsearch' );