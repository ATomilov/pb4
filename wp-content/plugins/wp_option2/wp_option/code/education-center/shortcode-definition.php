<?php

function is_viewed_lesson($id){
    if(!empty($_COOKIE['ol_lesson_'.$id]) && $_COOKIE['ol_lesson_'.$id] == 1){
        return true;
    }else{
        return false;
    }
}
function ol_course_lists_shortcode( $atts ) {
    ob_start();
    if(!empty($_GET['course_id'])){
        $olCourse = get_term($_GET['course_id']);

        $args = array(
            'post_type' => 'lesson',
            'tax_query' => array(
                array(
                    'taxonomy' => 'course',
                    'field'    => 'slug',
                    'terms'    => array( $olCourse->slug ),
                ),
            ),
        );
        $the_query = new WP_Query( $args );

        /* Restore original Post Data */
        wp_reset_postdata();

        $olLessons = $the_query;
        if(!empty($_GET['lesson_id'])){
            $olLesson = get_post($_GET['lesson_id']);
        }else{
            $olLesson = $olLessons->posts[0];
            $_GET['lesson_id'] = $olLesson->ID;
        }

        include (ol_locate_template('ol/education-center/course.php'));
    }else{
        $olCourses = get_terms( 'course', 'orderby=count&hide_empty=1' );
        include (ol_locate_template('ol/education-center/courses.php'));
    }
    $result = ob_get_clean();
    return $result;
}

add_shortcode( 'ol-courses', 'ol_course_lists_shortcode' );