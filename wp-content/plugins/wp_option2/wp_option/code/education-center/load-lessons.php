<?php

add_action( 'init', 'ol_lessons_init' );

/**
 * Register a market reviews post type.
 */
function ol_lessons_init() {
    $labels = array(
        'name'               => _x( 'Lessons', 'post type general name', 'ol-plugin' ),
        'singular_name'      => _x( 'Lessons', 'post type singular name', 'ol-olugin' ),
        'menu_name'          => _x( 'Education', 'admin menu', 'ol-olugin' ),
        'name_admin_bar'     => _x( 'Lessons', 'add new on admin bar', 'ol-olugin' ),
        'add_new'            => _x( 'Add New', 'platform', 'ol-olugin' ),
        'add_new_item'       => __( 'Add New Lesson', 'ol-olugin' ),
        'new_item'           => __( 'New Lesson', 'ol-olugin' ),
        'edit_item'          => __( 'Edit Lesson', 'ol-olugin' ),
        'view_item'          => __( 'View Lesson', 'ol-olugin' ),
        'all_items'          => __( 'Lessons', 'ol-olugin' ),
        'search_items'       => __( 'Search Lessons', 'ol-olugin' ),
        'parent_item_colon'  => __( 'Parent Lessons:', 'ol-olugin' ),
        'not_found'          => __( 'No lessons found.', 'ol-olugin' ),
        'not_found_in_trash' => __( 'No lessons found in Trash.', 'ol-olugin' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'ol-olugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'lesson' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => true,
        'menu_position'      => 100002,
        'supports'           => array( 'title', 'editor' )
    );

    register_post_type( 'lesson', $args );
}

if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group($arr);

    // Youtube code

    acf_add_local_field_group(array(
        'key' => 'ol_data',
        'title' => 'Data',
        'menu_order' => 2,
        'fields' => array (
            array (
                'key' => 'youtube_code',
                'label' => 'Youtube code',
                'name' => 'youtube_code',
                'tabs' => 'all',

                'type' => 'text',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'lesson',
                ),
            ),
        ),
        'label_placement' => 'left',
    ));


}