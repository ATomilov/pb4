<?php


function ol_forgot_shortcode( $atts ) {
    ob_start();

    include_once ol_locate_template('ol/forgot/main.php');

    $result = ob_get_clean();
    return $result;
}

add_shortcode( 'ol-forgot', 'ol_forgot_shortcode' );