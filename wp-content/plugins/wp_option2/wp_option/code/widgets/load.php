<?php

class OL_Registration_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'class_name' => 'ol-registration-widget',
            'description' => 'Optionlift Registration Widget',
        );
        parent::__construct( 'ol-registration-widget', 'OL Registration', $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        include (ol_locate_template('ol/widgets/registration.php'));
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}

add_action('widgets_init',
    create_function('', 'return register_widget("OL_Registration_Widget");')
);


class OL_RSS_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'class_name' => 'ol-rss-widget',
            'description' => 'RSS Feed Widget',
        );
        parent::__construct( 'ol-rss-widget', 'OL RSS Widget', $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        include (ol_locate_template('ol/widgets/rss.php'));

    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}

add_action('widgets_init',
    create_function('', 'return register_widget("OL_RSS_Widget");')
);
