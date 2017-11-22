<?php

add_action( 'init', 'ol_platforms_init' );
add_action( 'manage_platforms_posts_custom_column', 'ol_custom_columns', 10, 2 );
add_filter( 'manage_platforms_posts_columns', 'ol_add_columns' );
//require 'shortcode-definition.php';
//require_once 'crm-settings.php';

/**
 * Register a platforms post type.
 */
function ol_platforms_init() {
	$labels = array(
		'name'               => _x( 'Platforms', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Platform', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Trading', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Platform', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New Platform', 'platform', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Platform', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Platform', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Platform', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Platform', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Platforms', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Platforms', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Platforms:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No platforms found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No platforms found in Trash.', 'your-plugin-textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'platforms' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 100001,
		'supports'           => array( 'title' ),
	);

	register_post_type( 'platforms', $args );
}


function ol_custom_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'shortcode':
			echo '<input value="[ol-platform id=' . $post_id . ']" type="text"/>';
			break;

		case 'publisher':
			echo get_post_meta( $post_id, 'publisher', true );
			break;
	}
}

/* Add custom column to post list */
function ol_add_columns( $columns ) {
	return array_merge( $columns, array( 'shortcode' => __( 'Shortcode', 'your_text_domain' ) ) );
}
