<?php

require 'shortcode-defenition.php';

add_action( 'init', 'ol_questions_init' );

/**
 * Register a market reviews post type.
 */
function ol_questions_init() {
	$labels = array(
		'name'               => _x( 'Questions', 'post type general name', 'ol-plugin' ),
		'singular_name'      => _x( 'Questions', 'post type singular name', 'ol-olugin' ),
		'menu_name'          => _x( 'FAQ', 'admin menu', 'ol-olugin' ),
		'name_admin_bar'     => _x( 'Questions', 'add new on admin bar', 'ol-olugin' ),
		'add_new'            => _x( 'Add New', 'platform', 'ol-olugin' ),
		'add_new_item'       => __( 'Add New Question', 'ol-olugin' ),
		'new_item'           => __( 'New Question', 'ol-olugin' ),
		'edit_item'          => __( 'Edit Question', 'ol-olugin' ),
		'view_item'          => __( 'View Question', 'ol-olugin' ),
		'all_items'          => __( 'Questions', 'ol-olugin' ),
		'search_items'       => __( 'Search Questions', 'ol-olugin' ),
		'parent_item_colon'  => __( 'Parent Questions:', 'ol-olugin' ),
		'not_found'          => __( 'No questions found.', 'ol-olugin' ),
		'not_found_in_trash' => __( 'No questions found in Trash.', 'ol-olugin' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'ol-olugin' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'question' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => 100002,
		'supports'           => array( 'title', 'editor' ),
	);

	register_post_type( 'question', $args );
}

if ( function_exists( 'acf_add_local_field_group' ) ) {

	acf_add_local_field_group( $arr );

	// Youtube code
	acf_add_local_field_group(
		array(
			'key'             => 'ol_data',
			'title'           => 'Data',
			'menu_order'      => 2,
			'fields'          => array(
				array(
					'key'   => 'youtube_code',
					'label' => 'Youtube code',
					'name'  => 'youtube_code',
					'tabs'  => 'all',

					'type'  => 'text',
				),
			),
			'location'        => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'lesson',
					),
				),
			),
			'label_placement' => 'left',
		)
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_1',
			'title'                 => 'Question Data',
			'fields'                => array(
				array(
					'key'               => 'field_1',
					'label'             => 'Sub Title',
					'name'              => 'sub_title',
					'type'              => 'text',
					'prefix'            => '',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
					'readonly'          => 0,
					'disabled'          => 0,
				),
				array(
					'key'               => 'field_2',
					'label'             => 'Image of question',
					'name'              => 'image_question',
					'type'              => 'image',
					'prefix'            => '',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'return_format'     => 'url',
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
					'readonly'          => 0,
					'disabled'          => 0,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'question',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
		)
	);


}



add_action( 'init', 'ol_question_types_init' );

/**
 * Register a market reviews post type.
 */
function ol_question_types_init() {
	register_taxonomy(
		'question_type',
		[ 'question' ],
		array(
			'label'        => __( 'Question types' ),
			'public'       => true,
			'rewrite'      => array( 'slug' => 'question_type' ),
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

}
