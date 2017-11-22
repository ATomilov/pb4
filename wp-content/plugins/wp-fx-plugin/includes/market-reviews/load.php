<?php

add_action( 'init', 'ol_market_reviews_init' );

/**
 * Register a market reviews post type.
 */
function ol_market_reviews_init() {
    $labels = array(
        'name'               => _x( 'Market Reviews', 'post type general name', 'ol-plugin' ),
        'singular_name'      => _x( 'Market Review', 'post type singular name', 'ol-olugin' ),
        'menu_name'          => _x( 'Market Reviews', 'admin menu', 'ol-olugin' ),
        'name_admin_bar'     => _x( 'Market Review', 'add new on admin bar', 'ol-olugin' ),
        'add_new'            => _x( 'Add New', 'platform', 'ol-olugin' ),
        'add_new_item'       => __( 'Add New Market Review', 'ol-olugin' ),
        'new_item'           => __( 'New Market Review', 'ol-olugin' ),
        'edit_item'          => __( 'Edit Market Review', 'ol-olugin' ),
        'view_item'          => __( 'View Market Review', 'ol-olugin' ),
        'all_items'          => __( 'Market Reviews', 'ol-olugin' ),
        'search_items'       => __( 'Search Market Reviews', 'ol-olugin' ),
        'parent_item_colon'  => __( 'Parent Market Reviews:', 'ol-olugin' ),
        'not_found'          => __( 'No market reviews found.', 'ol-olugin' ),
        'not_found_in_trash' => __( 'No market reviews found in Trash.', 'ol-olugin' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'ol-olugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'market-reviews' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 10004,
        'supports'           => array( 'title', 'editor' )
    );

    register_post_type( 'marketreview', $args );
}


//include( 'shortcode-defenition.php' ); 