<?php
/**
 * Enqueue scripts and styles.
 */
function ol_scripts_js() {
    wp_enqueue_script( 'oo-ol-api-js', '//static.optionlift.com/sdk.js', array(), '', false );

}
add_action( 'wp_enqueue_scripts', 'ol_scripts_js' );


// function ol_new_nav__menu_items($items, $args) {

//     if($args->theme_location == 'primary'){
//         ob_start();
//         include (ol_locate_template('ol/forms/top.php'));
//         $result = ob_get_clean();

//         $items = $items . $result;
//     }

//     return $items;
// }
// add_filter('wp_nav_menu_items', 'ol_new_nav__menu_items', 10, 2);

function ol_user_menu( $atts ) {
       ob_start();
        include (ol_locate_template('ol/forms/top.php'));
        
        $result = ob_get_clean();
       
        return $result;

}

add_shortcode( 'ol-user-menu', 'ol_user_menu' );

function ol_modals(){
    ob_start();
    include (ol_locate_template('ol/forms/modals.php'));
    include (ol_locate_template('ol/forms/js.php'));
    include (ol_locate_template('ol/widgets/js.php'));
    $result = ob_get_clean();
    echo $result;
}
add_action( 'wp_footer', 'ol_modals');

