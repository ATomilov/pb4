<?php


function ol_faq_shortcode( $atts ) {
	ob_start();

	include_once ol_locate_template( 'ol/faq/main.php' );

	$result = ob_get_clean();
	return $result;
}

add_shortcode( 'ol-faq', 'ol_faq_shortcode' );
