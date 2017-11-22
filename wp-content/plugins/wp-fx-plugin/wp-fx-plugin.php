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

function my_acf_settings_path($path)
{
    $path = dirname(__FILE__) . '/assets/libs/acf/';
    return $path;
}
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_dir($dir)
{
    $dir = plugin_dir_url(__FILE__) . 'assets/libs/acf/';
    return $dir;
}
add_filter('acf/settings/dir', 'my_acf_settings_dir');

include_once plugin_dir_path(__FILE__) . 'assets/libs/acf/acf.php';

function add_scripts()
{
    wp_enqueue_script('jquery', plugin_dir_url(__FILE__) . '/assets/js/jquery-3.2.1.min.js');
    wp_enqueue_script('clndr', plugin_dir_url(__FILE__) . '/assets/js/clndr.min.js');
}
add_action('wp_enqueue_scripts', 'add_scripts');

function add_styles()
{
    wp_enqueue_style('main', plugin_dir_url(__FILE__) . '/assets/css/main.css');
}
add_action('wp_enqueue_scripts', 'add_styles');

//Include register custom post type
include_once 'includes/loader/load.php';

include_once 'includes/market-reviews/load.php';

include_once 'includes/education-center/load.php';

include_once 'includes/asset-index/load.php';

include_once 'includes/registration/load.php';

include_once 'includes/forgot/load.php';

include_once 'includes/faq/load.php';

include_once 'includes/webinars/load.php';

include_once 'includes/forms/load.php';

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
