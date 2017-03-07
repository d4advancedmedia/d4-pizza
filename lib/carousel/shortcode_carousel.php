<?php
/*
  Shortcode Name: d4carousel
  Usage: [d4getpost visible="" slides=""]
  Version: 7Mar17
  Author: D4 Adv. Media
  License: GPL2
*/

	function shortcode_d4carousel( $atts, $content = null ) {
		$attr=shortcode_atts(array(
			'visible' => '',
			'slides'  => '.gallery-item'
		), $atts);

		if ($attr['visible'] != '') {
			$visible = $attr['visible'];
		}

		$slides = $attr['slides'];

		// Enqueue script			
			wp_enqueue_script('cycle2-carousel');

		// Cycle Pagers
			//$carousel_prev = '<div class="carousel-pagerelement carousel-prev"><i class="fa fa-chevron-left"></i></div>';
			//$carousel_next = '<div class="carousel-pagerelement carousel-next"><i class="fa fa-chevron-right"></i></div>';

		// Start SLIDE WRAP
			$carousel_open =
				'<div class="carousel-wrap">'.$carousel_prev.'<div '.
					' class="cycle-slideshow"'. // Initializing class, default for cycle2
				#	' data-cycle-pager="#per-slide-template"'. // Connects to #per-slide-template box below
					' data-cycle-slides="'.$slides.'"'. // identifies the class identifier for slides
					' data-pause-on-hover="false"'. // Pause on hover
					' data-timeout="3000"'. // The time between slide transitions in milliseconds.
					' style="position:relative;"'.
					' data-cycle-fx="carousel"'.
					' data-cycle-carousel-visible="'.$visible.'"'.
    				' data-cycle-carousel-fluid="true"'.
    				' data-cycle-next=".carousel-next"'.
    				' data-cycle-prev=".carousel-prev"'.
				'>';

			$carousel_close = '</div>'.$carousel_next.'</div>';
			$carousel_inner = do_shortcode($content);
		

		$output = '';
		$output .= $carousel_open;
		$output .= $carousel_inner;
		$output .= $carousel_close;

		return $output;
	} add_shortcode( 'd4carousel', 'shortcode_d4carousel' );
?>