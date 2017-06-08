<?php
/*
  Shortcode Name: d4button
  Usage: [d4button link="" text=""]
  Version: 1.1.0
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

		//check if the string has a period in it - this would indicate that an image file should be used rather than an icon class
		if (strpos($attr['icon'], '.') !== false) {
			$icon_image = '<img src="'.$attr['icon'].'">';
		} else {
			$icon = $attr['icon'];
		}

		$output = '';
		$output .= '<div class="button-wrap '.$class.'" style="display:inline-block"><a '.$link.' class="button"'.$target.'><i class="button-icon '.$icon.'">'.$icon_image.'</i>';
		$output .= '<span class="button-text">'.$text.'</span>';
		$output .= $subtext;
		$output .= '</a></div>';

		return $output;
	} add_shortcode( 'd4button', 'shortcode_d4button' );
?>