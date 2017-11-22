<?php
function ol_webinars( $atts ) {
    ob_start();

    $args = array(
        'post_type' => 'events',
        'post_status' => array(  'publish', 'future' )
    );
    $the_query = new WP_Query( $args );

    $olEvents = [];
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $fields = get_fields(get_the_ID());
            $olEvents[] = (object)[
              'title' => get_the_title(),
              'date' => get_the_date('Y-m-d'),
              'time' => $fields['time'],
              'link' => $fields['external_link']
            ];
        }
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    include (ol_locate_template('ol/events/main.php'));

    $result = ob_get_clean();
    return $result;
}

add_shortcode( 'ol-events', 'ol_webinars' );