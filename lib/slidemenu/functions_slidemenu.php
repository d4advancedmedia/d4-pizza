<?

//	Register slidemenu
	register_nav_menus( array(
		'slidemenu'  => __( 'Mobile Slide Menu'),
	));

function add_d4slidemenu() {

	echo '<div id="mobile-overlay"></div>';

	wp_nav_menu( array(
		'container'       => false,
		'menu_class'      => 'nobull textright clearfix',
		'menu_id'         => 'd4slidemenu',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'theme_location'  => 'slidemenu',
		'depth'           => 2,
		'echo'            => true
	));

}

add_action('get_footer','add_d4slidemenu');	