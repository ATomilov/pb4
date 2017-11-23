<?php

// Get arguments
//extract(get_fields($id));

// Include html for platform
//require plugin_dir_path(__FILE__) . 'shortcode/html.php';
include PLUGIN_DIR . '/includes/loader/shortcode/html.php';

// Include custom theme
//require plugin_dir_path(__FILE__) . 'shortcode/custom-theme.php';
include PLUGIN_DIR . '/includes/loader/shortcode/custom-theme.php';

// Include settings
//require plugin_dir_path(__FILE__) . 'shortcode/settings.php';
include PLUGIN_DIR . '/includes/loader/shortcode/settings.php';

// Include scripts
//require plugin_dir_path(__FILE__) . 'shortcode/scripts.php';
include PLUGIN_DIR . '/includes/loader/shortcode/scripts.php';

// Include custom scripts/js
//require plugin_dir_path(__FILE__) . 'shortcode/customs.php';
include PLUGIN_DIR . '/includes/loader/shortcode/customs.php';
