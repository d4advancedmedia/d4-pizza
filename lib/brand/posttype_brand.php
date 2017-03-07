<?php
// Register Custom Post Type
function register_d4brands_post_type() {

	$labels = array(
		'name'                  => _x( 'Brands', 'Post Type General Name', 'd4-pizza' ),
		'singular_name'         => _x( 'Brand', 'Post Type Singular Name', 'd4-pizza' ),
		'menu_name'             => __( 'Brands', 'd4-pizza' ),
		'name_admin_bar'        => __( 'Brand', 'd4-pizza' ),
		'archives'              => __( 'Brand Archives', 'd4-pizza' ),
		'attributes'            => __( 'Brand Attributes', 'd4-pizza' ),
		'parent_item_colon'     => __( 'Parent Brand:', 'd4-pizza' ),
		'all_items'             => __( 'All Brands', 'd4-pizza' ),
		'add_new_item'          => __( 'Add New Brand', 'd4-pizza' ),
		'add_new'               => __( 'Add New', 'd4-pizza' ),
		'new_item'              => __( 'New Brand', 'd4-pizza' ),
		'edit_item'             => __( 'Edit Brand', 'd4-pizza' ),
		'update_item'           => __( 'Update Brand', 'd4-pizza' ),
		'view_item'             => __( 'View Brand', 'd4-pizza' ),
		'view_items'            => __( 'View Brands', 'd4-pizza' ),
		'search_items'          => __( 'Search Brand', 'd4-pizza' ),
		'not_found'             => __( 'Not found', 'd4-pizza' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'd4-pizza' ),
		'featured_image'        => __( 'Featured Image', 'd4-pizza' ),
		'set_featured_image'    => __( 'Set featured image', 'd4-pizza' ),
		'remove_featured_image' => __( 'Remove featured image', 'd4-pizza' ),
		'use_featured_image'    => __( 'Use as featured image', 'd4-pizza' ),
		'insert_into_item'      => __( 'Insert into item', 'd4-pizza' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'd4-pizza' ),
		'items_list'            => __( 'Items list', 'd4-pizza' ),
		'items_list_navigation' => __( 'Items list navigation', 'd4-pizza' ),
		'filter_items_list'     => __( 'Filter items list', 'd4-pizza' ),
	);
	$rewrite = array(
		'slug'                  => 'brands',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Brand', 'd4-pizza' ),
		'description'           => __( 'Brand Pages', 'd4-pizza' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-store',
	);
	register_post_type( 'd4brands', $args );

}
add_action( 'init', 'register_d4brands_post_type', 0 );