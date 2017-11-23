<?php
function ol_user_menu($atts)
{
    ob_start();
    include PLUGIN_DIR . '/templates/forms/forms-top.php';
    $result = ob_get_clean();
    return $result;
}

add_shortcode('ol-user-menu', 'ol_user_menu');
