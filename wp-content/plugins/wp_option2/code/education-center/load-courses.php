<?php


// add_action( 'admin_init', 'my_plugin_admin_init' );
// function my_plugin_admin_init() {
// * Register our script. */
// add_submenu_page('edit.php?post_type=badge', 'Skills', 'Skills', 'manage_options', 'edit.php?taxonomy=skill&post_type=badge');
// add_submenu_page('edit.php?post_type=platforms', 'Courses', 'Courses', 'manage_categories', 'edit-tags.php?taxonomy=course' );
// }
add_action( 'init', 'ol_courses_init' );

/**
 * Register a market reviews post type.
 */
function ol_courses_init() {
	register_taxonomy(
		'course',
		[ 'lesson' ],
		array(
			'label'        => __( 'Courses' ),
			'public'       => true,
			'rewrite'      => array( 'slug' => 'course' ),
			'show_ui'      => true,
			'show_in_menu' => true,
			'query_var'    => true,
			'hierarchical' => true,
			'capabilities' => array(
				'manage_terms' => 'manage_categories',
				'edit_terms'   => 'manage_categories',
				'delete_terms' => 'manage_categories',
				'assign_terms' => 'edit_posts',
			),
		)
	);

	$prefix = 'ol_';
	/*
     * configure your meta box
     */
	$config = array(
		'id'             => 'ol_course_meta_box',          // meta box id, unique per meta box
		'title'          => 'Attributes',          // meta box title
		'pages'          => array( 'course' ),        // taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),            // list of meta fields (can be added by field arrays)
		'local_images'   => true,          // Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false,          // change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	$my_meta = new Tax_Meta_Class( $config );
	$my_meta->addImage( $prefix . 'image_field_id', array( 'name' => __( 'Main image ', 'tax-meta' ) ) );
}
