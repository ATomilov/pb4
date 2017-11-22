<?php

function ol_forgot_shortcode($atts)
{
    ob_start();
    if ($overridden_template = locate_template('wp-fx-plugin/forgot-main.php')) {
        load_template($overridden_template);
    } else {
        load_template(PLUGIN_DIR . '/templates/forgot/forgot-main.php');
    }
    $result = ob_get_clean();
    return $result;
}

add_shortcode('ol-forgot', 'ol_forgot_shortcode');
