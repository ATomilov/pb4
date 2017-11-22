<?php


function ol_registration_shortcode( $atts ) {
    ob_start();

    include_once ol_locate_template('ol/registration/main.php');

    $result = ob_get_clean();
    return $result;
}

add_shortcode( 'ol-registration', 'ol_registration_shortcode' );