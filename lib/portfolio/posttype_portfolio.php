<?php
// Register Custom Post Type
function register_d4portfolio_post_type() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'd4-pizza' ),
		'singular_name'         => _x( 'Item', 'Post Type Singular Name', 'd4-pizza' ),
		'menu_name'             => __( 'Portfolio', 'd4-pizza' ),
		'name_admin_bar'        => __( 'Item', 'd4-pizza' ),
		'archives'              => __( 'Item Archives', 'd4-pizza' ),
		'attributes'            => __( 'Item Attributes', 'd4-pizza' ),
		'parent_item_colon'     => __( 'Parent Item:', 'd4-pizza' ),
		'all_items'             => __( 'All Items', 'd4-pizza' ),
		'add_new_item'          => __( 'Add New Item', 'd4-pizza' ),
		'add_new'               => __( 'Add New', 'd4-pizza' ),
		'new_item'              => __( 'New Item', 'd4-pizza' ),
		'edit_item'             => __( 'Edit Item', 'd4-pizza' ),
		'update_item'           => __( 'Update Item', 'd4-pizza' ),
		'view_item'             => __( 'View Item', 'd4-pizza' ),
		'view_items'            => __( 'View Items', 'd4-pizza' ),
		'search_items'          => __( 'Search Items', 'd4-pizza' ),
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
		'slug'                  => 'portfolio',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'd4-pizza' ),
		'description'           => __( 'Portfolio Items', 'd4-pizza' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
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
		'menu_icon'				=> 'dashicons-format-gallery',
	);
	register_post_type( 'd4portfolio', $args );

}
add_action( 'init', 'register_d4portfolio_post_type', 0 );

// Register Custom Taxonomy
function register_d4portfolio_categories() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'd4-pizza' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'd4-pizza' ),
		'menu_name'                  => __( 'Portfolio Categories', 'd4-pizza' ),
		'all_items'                  => __( 'All Portfolio Categories', 'd4-pizza' ),
		'parent_item'                => __( 'Parent Portfolio Category', 'd4-pizza' ),
		'parent_item_colon'          => __( 'Parent Portfolio Category:', 'd4-pizza' ),
		'new_item_name'              => __( 'Portfolio Category Name', 'd4-pizza' ),
		'add_new_item'               => __( 'Add New Portfolio Category', 'd4-pizza' ),
		'edit_item'                  => __( 'Edit Portfolio Category', 'd4-pizza' ),
		'update_item'                => __( 'Update Portfolio Category', 'd4-pizza' ),
		'view_item'                  => __( 'View Portfolio Category', 'd4-pizza' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'd4-pizza' ),
		'add_or_remove_items'        => __( 'Add or Remove Portfolio Categories', 'd4-pizza' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'd4-pizza' ),
		'popular_items'              => __( 'Popular Portfolio Categories', 'd4-pizza' ),
		'search_items'               => __( 'Search Portfolio Categories', 'd4-pizza' ),
		'not_found'                  => __( 'Not Found', 'd4-pizza' ),
		'no_terms'                   => __( 'No items', 'd4-pizza' ),
		'items_list'                 => __( 'Portfolio Categories list', 'd4-pizza' ),
		'items_list_navigation'      => __( 'Portfolio Categories list navigation', 'd4-pizza' ),
	);
	$rewrite = array(
		'slug'                       => 'portfolio-categories',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'd4portfolio_category', array( 'd4portfolio' ), $args );

}
add_action( 'init', 'register_d4portfolio_categories', 0 );

// Register Custom Taxonomy
function register_d4portfolio_tags() {

	$labels = array(
		'name'                       => _x( 'Portfolio Tags', 'Taxonomy General Name', 'd4-pizza' ),
		'singular_name'              => _x( 'Portfolio Tag', 'Taxonomy Singular Name', 'd4-pizza' ),
		'menu_name'                  => __( 'Portfolio Tags', 'd4-pizza' ),
		'all_items'                  => __( 'All Portfolio Tags', 'd4-pizza' ),
		'parent_item'                => __( 'Parent Portfolio Tag', 'd4-pizza' ),
		'parent_item_colon'          => __( 'Parent Portfolio Tag:', 'd4-pizza' ),
		'new_item_name'              => __( 'Portfolio Tag Name', 'd4-pizza' ),
		'add_new_item'               => __( 'Add New Portfolio Tag', 'd4-pizza' ),
		'edit_item'                  => __( 'Edit Portfolio Tag', 'd4-pizza' ),
		'update_item'                => __( 'Update Portfolio Tag', 'd4-pizza' ),
		'view_item'                  => __( 'View Portfolio Tag', 'd4-pizza' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'd4-pizza' ),
		'add_or_remove_items'        => __( 'Add or Remove Portfolio Tags', 'd4-pizza' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'd4-pizza' ),
		'popular_items'              => __( 'Popular Portfolio Tags', 'd4-pizza' ),
		'search_items'               => __( 'Search Portfolio Tags', 'd4-pizza' ),
		'not_found'                  => __( 'Not Found', 'd4-pizza' ),
		'no_terms'                   => __( 'No items', 'd4-pizza' ),
		'items_list'                 => __( 'Portfolio Tags list', 'd4-pizza' ),
		'items_list_navigation'      => __( 'Portfolio Tags list navigation', 'd4-pizza' ),
	);
	$rewrite = array(
		'slug'                       => 'portfolio-tags',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'd4portfolio_tag', array( 'd4portfolio' ), $args );

}
add_action( 'init', 'register_d4portfolio_tags', 0 );

// Register Custom Taxonomy
function register_d4portfolio_project() {

	$labels = array(
		'name'                       => _x( 'Portfolio Projects', 'Taxonomy General Name', 'd4-pizza' ),
		'singular_name'              => _x( 'Portfolio Project', 'Taxonomy Singular Name', 'd4-pizza' ),
		'menu_name'                  => __( 'Portfolio Projects', 'd4-pizza' ),
		'all_items'                  => __( 'All Portfolio Projects', 'd4-pizza' ),
		'parent_item'                => __( 'Parent Portfolio Project', 'd4-pizza' ),
		'parent_item_colon'          => __( 'Parent Portfolio Project:', 'd4-pizza' ),
		'new_item_name'              => __( 'Portfolio Project Name', 'd4-pizza' ),
		'add_new_item'               => __( 'Add New Portfolio Project', 'd4-pizza' ),
		'edit_item'                  => __( 'Edit Portfolio Project', 'd4-pizza' ),
		'update_item'                => __( 'Update Portfolio Project', 'd4-pizza' ),
		'view_item'                  => __( 'View Portfolio Project', 'd4-pizza' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'd4-pizza' ),
		'add_or_remove_items'        => __( 'Add or Remove Portfolio Projects', 'd4-pizza' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'd4-pizza' ),
		'popular_items'              => __( 'Popular Portfolio Projects', 'd4-pizza' ),
		'search_items'               => __( 'Search Portfolio Projects', 'd4-pizza' ),
		'not_found'                  => __( 'Not Found', 'd4-pizza' ),
		'no_terms'                   => __( 'No items', 'd4-pizza' ),
		'items_list'                 => __( 'Portfolio Projects list', 'd4-pizza' ),
		'items_list_navigation'      => __( 'Portfolio Projects list navigation', 'd4-pizza' ),
	);
	$rewrite = array(
		'slug'                       => 'portfolio-tags',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'd4portfolio_project', array( 'd4portfolio' ), $args );

}
add_action( 'init', 'register_d4portfolio_project', 0 );