<?php
/*
Plugin Name: Optionlift 2 Test
Plugin URI: http://optionlift2.com/
Description: Easy integration and configuration plugin for optionlift platform.
Version: 0.2
Author: Michael Kastiel
License: GPLv2 or later
Text Domain: optionlift2
*/


// Include functions
include('functions.php');
//
// Include shortcode and crm settings for trading platform
include_once( 'code/loader/load.php' );
//
//// Include market review post type
include_once( 'code/market-reviews/load.php' );

// Include education center
include_once( 'code/education-center/load.php' );

// Include asset index
include_once( 'code/asset-index/load.php' );

// Include register form
include_once( 'code/registration/load.php' );

// Include forgot form
include_once( 'code/forgot/load.php' );

// Include faq form
include_once( 'code/faq/load.php' );

// Include webinars
include_once( 'code/webinars/load.php' );
//
//// Include forms
include_once( 'code/forms/load.php' );
//
// Include forms
include_once( 'code/settings/load.php' );

// Include widgets
include_once( 'code/widgets/load.php' );
