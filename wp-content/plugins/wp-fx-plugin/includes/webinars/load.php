<?php

add_action( 'init', 'ol_webinars_init' );

/**
 * Register a market reviews post type.
 */
function ol_webinars_init() {
    $labels = array(
        'name'               => _x( 'Events', 'post type general name', 'ol-plugin' ),
        'singular_name'      => _x( 'Events', 'post type singular name', 'ol-olugin' ),
        'menu_name'          => _x( 'Events', 'admin menu', 'ol-olugin' ),
        'name_admin_bar'     => _x( 'Events', 'add new on admin bar', 'ol-olugin' ),
        'add_new'            => _x( 'Add New', 'platform', 'ol-olugin' ),
        'add_new_item'       => __( 'Add New Events', 'ol-olugin' ),
        'new_item'           => __( 'New Events', 'ol-olugin' ),
        'edit_item'          => __( 'Edit Events', 'ol-olugin' ),
        'view_item'          => __( 'View Events', 'ol-olugin' ),
        'all_items'          => __( 'Events', 'ol-olugin' ),
        'search_items'       => __( 'Search Events', 'ol-olugin' ),
        'parent_item_colon'  => __( 'Parent Events:', 'ol-olugin' ),
        'not_found'          => __( 'No events found.', 'ol-olugin' ),
        'not_found_in_trash' => __( 'No events found in Trash.', 'ol-olugin' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'ol-olugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'events' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 100006,
        'supports'           => array( 'title' )
    );

    register_post_type( 'events', $args );
}

if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array(
        'key' => 'extarnal_link_group',
        'title' => 'Data',
        'menu_order' => 2,
        'fields' => array (
            array (
                'key' => 'external_link',
                'label' => 'External Link',
                'name' => 'external_link',
                'tabs' => 'all',
                'type' => 'text',
            ),
            array (
                'key' => 'time',
                'label' => 'Time',
                'name' => 'time',
                'tabs' => 'all',
                'type' => 'text',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'events',
                ),
            ),
        ),
        'label_placement' => 'left',
    ));


}

//include( 'shortcode-definition.php' );
