<?php
/*
Plugin Name: WP FX Plugin
Plugin URI: http://wp-fx-plugin.com/
Description: Easy integration and configuration plugin for optionlift platform.
Version: 0.2
Author: Michael Kastiel
License: GPLv2 or later
Text Domain: wp-fx-plugin
 */

define('PLUGIN_DIR', dirname(__FILE__) . '/');
define('PLUGIN_DIR_URL', plugin_dir_url(__FILE__));

function my_acf_settings_path($path)
{
    $path = PLUGIN_DIR . '/assets/libs/acf/';
    return $path;
}
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_dir($dir)
{
    $dir = PLUGIN_DIR_URL . 'assets/libs/acf/';
    return $dir;
}
add_filter('acf/settings/dir', 'my_acf_settings_dir');

include_once PLUGIN_DIR . 'assets/libs/acf/acf.php';

function add_scripts()
{
    wp_enqueue_script('jquery', PLUGIN_DIR_URL . 'assets/js/jquery-3.2.1.min.js');
    wp_enqueue_script('clndr', PLUGIN_DIR_URL . 'assets/js/clndr.min.js');
    wp_enqueue_script('main', PLUGIN_DIR_URL . 'assets/js/main.js');
    $static_url = '//' . get_option('ol_static_url') . '/sdk.js';
    wp_enqueue_script('oo-ol-api-js', $static_url, [], '', false);
    wp_enqueue_script('require', PLUGIN_DIR_URL . 'assets/js/require.min.js');
    wp_enqueue_script('require', PLUGIN_DIR_URL . 'assets/js/forms.js');
    wp_enqueue_script('require', PLUGIN_DIR_URL . 'assets/js/widgets.js');
    wp_enqueue_script('require', PLUGIN_DIR_URL . 'assets/js/moment.js');
    wp_enqueue_script('require', PLUGIN_DIR_URL . 'assets/js/underscore-min.js');
    wp_enqueue_script('require', PLUGIN_DIR_URL . 'assets/js/forgot.js');
    wp_enqueue_script('require', PLUGIN_DIR_URL . 'assets/js/market-review.js');
}
add_action('wp_enqueue_scripts', 'add_scripts');

function add_styles()
{
    wp_enqueue_style('main', PLUGIN_DIR_URL . 'assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'add_styles');

//Include register custom post type
include_once 'includes/loader/load.php';

include_once 'includes/market-reviews/load.php';

include_once 'includes/education-center/load.php';

include_once 'includes/asset-index/load.php';

//include_once 'includes/registration/load.php';

include_once 'includes/forgot/load.php';

include_once 'includes/faq/load.php';

include_once 'includes/webinars/load.php';

//include_once 'includes/forms/load.php';

include_once 'includes/settings/load.php';

include_once 'includes/widgets/load.php';

//Include shortcodes
include_once 'includes/shortcodes/shortcode-defenition-faq.php';

include_once 'includes/shortcodes/shortcode-defenition-forgot.php';

include_once 'includes/shortcodes/shortcode-defenition-market-reviews.php';

include_once 'includes/shortcodes/shortcode-defenition-registration.php';

include_once 'includes/shortcodes/shortcode-definition-asset-index.php';

include_once 'includes/shortcodes/shortcode-definition-education-center.php';

include_once 'includes/shortcodes/shortcode-definition-loader.php'; //Think about how make this better

include_once 'includes/shortcodes/shortcode-definition-webinars.php';

include_once 'includes/shortcodes/shortcode-definition-forms.php';

function ol_new_nav__menu_items($items, $args)
{
    ob_start();
    include ol_locate_template('ol/forms/top.php');
    if ($overridden_template = locate_template('wp-fx-plugin/forms-top.php')) {
        load_template($overridden_template);
    } else {
        load_template(PLUGIN_DIR . '/templates/forms/forms-top.php');
    }
    $result = ob_get_clean();
    $items = $items . $result;
    return $items;
}

add_filter('wp_nav_menu_items', 'ol_new_nav__menu_items', 10, 2);

function ol_modals()
{
    ob_start();
    if ($overridden_template = locate_template('wp-fx-plugin/forms-modals.php')) {
        load_template($overridden_template);
    } else {
        load_template(PLUGIN_DIR . '/templates/forms/forms-modals.php');
    }
    //include PLUGIN_DIR . 'templates/forms/forms-js.php';
    //include PLUGIN_DIR . 'templates/widgets/widgets-js.php';
    $result = ob_get_clean();
    echo $result;
}

add_action('wp_footer', 'ol_modals');


function ol_custom_columns($column, $post_id)
{
    switch ($column) {
        case 'shortcode':
            echo '<input value="[ol-platform id=' . $post_id . ']" type="text"/>';
            break;

        case 'publisher':
            echo get_post_meta($post_id, 'publisher', true);
            break;
    }
}
add_action('manage_platforms_posts_custom_column', 'ol_custom_columns', 10, 2);

/* Add custom column to post list */
function ol_add_columns($columns)
{
    return array_merge($columns, array('shortcode' => __('Shortcode', 'your_text_domain')));
}
add_filter('manage_platforms_posts_columns', 'ol_add_columns');
