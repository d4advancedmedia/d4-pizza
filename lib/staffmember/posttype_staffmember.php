<?php
// Register Custom Post Type
function register_d4staffmember_post_type() {

	$labels = array(
		'name'                  => _x( 'Staff Members', 'Post Type General Name', 'd4-pizza' ),
		'singular_name'         => _x( 'Staff Member', 'Post Type Singular Name', 'd4-pizza' ),
		'menu_name'             => __( 'Staff Members', 'd4-pizza' ),
		'name_admin_bar'        => __( 'Post Type', 'd4-pizza' ),
		'archives'              => __( 'Staff Member Archives', 'd4-pizza' ),
		'attributes'            => __( 'Staff Member Attributes', 'd4-pizza' ),
		'parent_item_colon'     => __( 'Parent Staff Member:', 'd4-pizza' ),
		'all_items'             => __( 'All Staff Members', 'd4-pizza' ),
		'add_new_item'          => __( 'Add New Staff Member', 'd4-pizza' ),
		'add_new'               => __( 'Add New', 'd4-pizza' ),
		'new_item'              => __( 'New Staff Member', 'd4-pizza' ),
		'edit_item'             => __( 'Edit Staff Member', 'd4-pizza' ),
		'update_item'           => __( 'Update Staff Member', 'd4-pizza' ),
		'view_item'             => __( 'View Staff Member', 'd4-pizza' ),
		'view_items'            => __( 'View Staff Members', 'd4-pizza' ),
		'search_items'          => __( 'Search Staff Member', 'd4-pizza' ),
		'not_found'             => __( 'Not found', 'd4-pizza' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'd4-pizza' ),
		'featured_image'        => __( 'Featured Image', 'd4-pizza' ),
		'set_featured_image'    => __( 'Set featured image', 'd4-pizza' ),
		'remove_featured_image' => __( 'Remove featured image', 'd4-pizza' ),
		'use_featured_image'    => __( 'Use as featured image', 'd4-pizza' ),
		'insert_into_item'      => __( 'Insert into item', 'd4-pizza' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'd4-pizza' ),
		'items_list'            => __( 'Staff Members list', 'd4-pizza' ),
		'items_list_navigation' => __( 'Staff Members list navigation', 'd4-pizza' ),
		'filter_items_list'     => __( 'Filter items list', 'd4-pizza' ),
	);
	$rewrite = array(
		'slug'                  => 'staff',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Staff Member', 'd4-pizza' ),
		'description'           => __( 'Staff Members', 'd4-pizza' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', ),
		'taxonomies'            => array( '' ),
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
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-groups'
	);
	register_post_type( 'd4staffmember', $args );

}
add_action( 'init', 'register_d4staffmember_post_type', 0 );

// Register Custom Taxonomy
function register_d4staffmember_categories() {

	$labels = array(
		'name'                       => _x( 'Staff Member Categories', 'Taxonomy General Name', 'd4-pizza' ),
		'singular_name'              => _x( 'Staff Member Category', 'Taxonomy Singular Name', 'd4-pizza' ),
		'menu_name'                  => __( 'Staff Member Categories', 'd4-pizza' ),
		'all_items'                  => __( 'All Staff Member Categories', 'd4-pizza' ),
		'parent_item'                => __( 'Parent Staff Member Category', 'd4-pizza' ),
		'parent_item_colon'          => __( 'Parent Staff Member Category:', 'd4-pizza' ),
		'new_item_name'              => __( 'Staff Member Category Name', 'd4-pizza' ),
		'add_new_item'               => __( 'Add New Staff Member Category', 'd4-pizza' ),
		'edit_item'                  => __( 'Edit Staff Member Category', 'd4-pizza' ),
		'update_item'                => __( 'Update Staff Member Category', 'd4-pizza' ),
		'view_item'                  => __( 'View Staff Member Category', 'd4-pizza' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'd4-pizza' ),
		'add_or_remove_items'        => __( 'Add or Remove Staff Member Categories', 'd4-pizza' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'd4-pizza' ),
		'popular_items'              => __( 'Popular Staff Member Categories', 'd4-pizza' ),
		'search_items'               => __( 'Search Staff Member Categories', 'd4-pizza' ),
		'not_found'                  => __( 'Not Found', 'd4-pizza' ),
		'no_terms'                   => __( 'No items', 'd4-pizza' ),
		'items_list'                 => __( 'Staff Member Categories list', 'd4-pizza' ),
		'items_list_navigation'      => __( 'Staff Member Categories list navigation', 'd4-pizza' ),
	);
	$rewrite = array(
		'slug'                       => 'staff-categories',
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
	register_taxonomy( 'd4staffmember_category', array( 'd4staffmember' ), $args );

}
add_action( 'init', 'register_d4staffmember_categories', 0 );

// Register Custom Taxonomy
function register_d4staffmember_tags() {

	$labels = array(
		'name'                       => _x( 'Staff Member Tags', 'Taxonomy General Name', 'd4-pizza' ),
		'singular_name'              => _x( 'Staff Member Tag', 'Taxonomy Singular Name', 'd4-pizza' ),
		'menu_name'                  => __( 'Staff Member Tags', 'd4-pizza' ),
		'all_items'                  => __( 'All Staff Member Tags', 'd4-pizza' ),
		'parent_item'                => __( 'Parent Staff Member Tag', 'd4-pizza' ),
		'parent_item_colon'          => __( 'Parent Staff Member Tag:', 'd4-pizza' ),
		'new_item_name'              => __( 'Staff Member Tag Name', 'd4-pizza' ),
		'add_new_item'               => __( 'Add New Staff Member Tag', 'd4-pizza' ),
		'edit_item'                  => __( 'Edit Staff Member Tag', 'd4-pizza' ),
		'update_item'                => __( 'Update Staff Member Tag', 'd4-pizza' ),
		'view_item'                  => __( 'View Staff Member Tag', 'd4-pizza' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'd4-pizza' ),
		'add_or_remove_items'        => __( 'Add or Remove Staff Member Tags', 'd4-pizza' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'd4-pizza' ),
		'popular_items'              => __( 'Popular Staff Member Tags', 'd4-pizza' ),
		'search_items'               => __( 'Search Staff Member Tags', 'd4-pizza' ),
		'not_found'                  => __( 'Not Found', 'd4-pizza' ),
		'no_terms'                   => __( 'No items', 'd4-pizza' ),
		'items_list'                 => __( 'Staff Member Tags list', 'd4-pizza' ),
		'items_list_navigation'      => __( 'Staff Member Tags list navigation', 'd4-pizza' ),
	);
	$rewrite = array(
		'slug'                       => 'staff-tags',
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
	register_taxonomy( 'd4staffmember_tag', array( 'd4staffmember' ), $args );

}
add_action( 'init', 'register_d4staffmember_tags', 0 );
?>