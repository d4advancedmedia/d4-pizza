<?php
/*
  Shortcode Name: d4button
  Usage: [d4button link="" text=""]
  Version: 1.0.0
  Author: D4 Adv. Media
  License: GPL2
*/

	function shortcode_d4button( $atts ) {
		$attr=shortcode_atts(array(
			'text'		=> '',
			'subtext'	=> '',
			'link' 		=> '',
			'icon' 		=> '',
			'target' 	=> '',
			'class'		=> '',
		), $atts);

		if ($attr['text'] != '') {
			$text = $attr['text'];
		} else {
			$text = 'Learn More';
		}

		if ($attr['subtext'] != '') {
			$subtext = '<span class="button-subtext">'.$attr['subtext'].'</span>';
		}

		if ($attr['link'] != '') {
			$link = 'href="'.$attr['link'].'"';
		}
		if ($attr['target'] != '') {
			$target = ' target="'.$attr['target'].'"';
		}
		if ($attr['class'] != '') {
			$class = ' '.$attr['class'].'"';
		}

		$icon = $attr['icon'];

		$output = '';
		$output .= '<a '.$link.' class="button '.$class.'"'.$target.'><i class="button-icon '.$icon.'"></i>';
		$output .= $text;
		$output .= $subtext;
		$output .= '</a>';

		return $output;
	} add_shortcode( 'd4button', 'shortcode_d4button' );
?>