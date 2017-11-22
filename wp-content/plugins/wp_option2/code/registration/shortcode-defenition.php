<?php


function ol_registration_shortcode( $atts ) {
	ob_start();

	include_once ol_locate_template( 'ol/registration/main.php' );

	$result = ob_get_clean();

	return $result;
}

add_shortcode( 'ol-registration', 'ol_registration_shortcode' );

function ol_login_shortcode( $atts ) {
	ob_start();

	include_once ol_locate_template( 'ol/registration/login.php' );

	$result = ob_get_clean();

	return $result;
}

add_shortcode( 'ol-login', 'ol_login_shortcode' );
