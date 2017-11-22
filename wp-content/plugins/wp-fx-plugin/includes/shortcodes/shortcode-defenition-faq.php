<?php

function ol_faq_shortcode($atts)
{
    ob_start();
    if ($overridden_template = locate_template('wp-fx-plugin/faq-main.php')) {
        load_template($overridden_template);
    } else {
        load_template(PLUGIN_DIR . '/templates/faq/faq-main.php');
    }
    $result = ob_get_clean();
    return $result;
}

add_shortcode('ol-faq', 'ol_faq_shortcode');
