<?php


function ol_market_review_shortcode( $atts ) {
    ob_start();

    include_once ol_locate_template('ol/market-review/main.php');

    $result = ob_get_clean();
    return $result;
}

add_shortcode( 'ol-market-review', 'ol_market_review_shortcode' );  