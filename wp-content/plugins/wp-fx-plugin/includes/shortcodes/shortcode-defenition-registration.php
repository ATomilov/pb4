<?php

function ol_registration_shortcode($atts)
{
    ob_start();
    if ($overridden_template = locate_template('wp-fx-plugin/registration-main.php')) {
        load_template($overridden_template);
    } else {
        load_template(PLUGIN_DIR . '/templates/registration/registration-main.php');
    }
    $result = ob_get_clean();
    return $result;
}

add_shortcode('ol-registration', 'ol_registration_shortcode');

function ol_login_shortcode($atts)
{
    ob_start();
    if ($overridden_template = locate_template('wp-fx-plugin/registration-login.php')) {
        load_template($overridden_template);
    } else {
        load_template(PLUGIN_DIR . '/templates/registration/registration-login.php');
    }
    $result = ob_get_clean();
    return $result;
}

add_shortcode('ol-login', 'ol_login_shortcode');
