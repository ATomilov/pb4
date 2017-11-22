<?php

add_action( 'init', 'ol_asset_indexes_init' );
add_action( 'manage_assetindexes_posts_custom_column' , 'ol_custom_asset_index_columns', 10, 2 );
add_filter( 'manage_assetindexes_posts_columns' , 'ol_add_custom_asset_index_columns' );
/**
 * Register a market reviews post type.
 */
function ol_asset_indexes_init() {
    $labels = array(
        'name'               => _x( 'Asset Index', 'post type general name', 'ol-plugin' ),
        'singular_name'      => _x( 'Asset Index', 'post type singular name', 'ol-olugin' ),
        'menu_name'          => _x( 'Assets Index', 'admin menu', 'ol-olugin' ),
        'name_admin_bar'     => _x( 'Asset Index', 'add new on admin bar', 'ol-olugin' ),
        'add_new'            => _x( 'Add New', 'platform', 'ol-olugin' ),
        'add_new_item'       => __( 'Add New Asset Index', 'ol-olugin' ),
        'new_item'           => __( 'New Asset Index', 'ol-olugin' ),
        'edit_item'          => __( 'Edit Asset Index', 'ol-olugin' ),
        'view_item'          => __( 'View Asset Index', 'ol-olugin' ),
        'all_items'          => __( 'Asset Index', 'ol-olugin' ),
        'search_items'       => __( 'Search Asset Indexes', 'ol-olugin' ),
        'parent_item_colon'  => __( 'Parent Asset Indexes:', 'ol-olugin' ),
        'not_found'          => __( 'No asset indexes found.', 'ol-olugin' ),
        'not_found_in_trash' => __( 'No asset indexes found in Trash.', 'ol-olugin' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'ol-olugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'assetindexes' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 10003,
        'supports'           => array( 'title' )
    );

    register_post_type( 'assetindexes', $args );
}

function ol_custom_asset_index_columns( $column, $post_id ) {
    switch ( $column ) {
        case 'shortcode':
            echo '<input value="[ol-asset-index id='.$post_id.']" type="text"/>';
            break;

        case 'publisher':
            echo get_post_meta( $post_id, 'publisher', true );
            break;
    }
}

/* Add custom column to post list */
function ol_add_custom_asset_index_columns( $columns ) {
    return array_merge( $columns, array( 'shortcode' => __( 'Shortcode', 'your_text_domain' ) ) );
}

//Shortcodes
include( 'assets-settings.php' );

include( 'shortcode-definition.php' );
