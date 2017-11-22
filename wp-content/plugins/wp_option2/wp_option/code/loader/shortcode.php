<?php

// Get arguments
extract(get_fields($id));


// Include html for platform
include( plugin_dir_path( __FILE__ ) . 'shortcode/html.php');

// Include custom theme
include( plugin_dir_path( __FILE__ ) . 'shortcode/custom-theme.php');

// Include settings
include( plugin_dir_path( __FILE__ ) . 'shortcode/settings.php');

// Include scripts
include( plugin_dir_path( __FILE__ ) . 'shortcode/scripts.php');

// Include custom scripts/js
include( plugin_dir_path( __FILE__ ) . 'shortcode/customs.php');



