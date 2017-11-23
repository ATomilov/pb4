<?php
function ol_shortcode($atts)
{
    $a = shortcode_atts(
        array(
            'id' => '1',
        ), $atts
    );
    $id = $a['id'];
    ob_start();
    //include plugin_dir_path(__FILE__) . 'shortcode.php';
    include PLUGIN_DIR . 'includes/loader/shortcode.php';
    $result = ob_get_clean();
    return $result;
}

add_shortcode('ol-platform', 'ol_shortcode');
