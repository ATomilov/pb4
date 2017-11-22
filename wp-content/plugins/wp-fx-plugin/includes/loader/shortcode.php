<?php

// Get arguments
extract(get_fields($id));

// Include html for platform
require plugin_dir_path(__FILE__) . 'shortcode/html.php';

// Include custom theme
require plugin_dir_path(__FILE__) . 'shortcode/custom-theme.php';

// Include settings
require plugin_dir_path(__FILE__) . 'shortcode/settings.php';

// Include scripts
require plugin_dir_path(__FILE__) . 'shortcode/scripts.php';

// Include custom scripts/js
require plugin_dir_path(__FILE__) . 'shortcode/customs.php';
