<?php

function ol_market_review_shortcode($atts)
{
    ob_start();
    if ($overridden_template = locate_template('wp-fx-plugin/market-review-main.php')) {
        load_template($overridden_template);
    } else {
        load_template(PLUGIN_DIR . '/templates/market-review/market-review-main.php');
    }
    $result = ob_get_clean();
    return $result;
}

add_shortcode('ol-market-review', 'ol_market_review_shortcode');
