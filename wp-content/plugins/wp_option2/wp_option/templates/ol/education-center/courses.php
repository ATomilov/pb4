<?php if(sizeof($olCourses) == 0):?>
    <div class="row">
        Empty courses list.
    </div>
<?php else:?>
<div class="row">
    <?php foreach($olCourses as $course):?>
        <?php
        $saved_data = get_metadata('term',$course->term_id,'ol_image_field_id');
        $original_image = null;
        if(!empty($saved_data[0]) && !empty($saved_data[0]['url'])) $original_image = $saved_data[0]['url'];
        $image = (object) vt_resize(null, $original_image, 350,150, true);
        ?>

        <div class="col-sm-4">
            <a class="thumbnail" href="?course_id=<?php echo $course->term_id; ?>">
                <img src="<?php echo $image->url;?>">
            </a>

            <div class="caption">
                <h3><?php echo $course->name;?> <span class="pull-right"><?php echo $course->count;?> Lessons</span></h3>
                <p><?php echo $course->description;?></p>

                <ul class="lessons">
                    <?php

                    $args = array(
                        'post_type' => 'lesson',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'course',
                                'field'    => 'slug',
                                'terms'    => array( $course->slug ),
                            ),
                        ),
                    );
                    $the_query = new WP_Query( $args );

                    /* Restore original Post Data */
                    wp_reset_postdata();

                    $lessons = $the_query;

                    foreach ($lessons->posts as $lesson) {
                        echo '<li><a href="'.$lesson->guid.'">'.$lesson->post_title.'</a></li>';
                    }

                    ?>
                </ul>
            </div>
        </div>

    <?php endforeach;?>
</div>
<?php endif;?>
