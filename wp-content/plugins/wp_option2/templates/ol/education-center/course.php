<div class="row">
    <div class="col-xs-12">
        <?php extract(get_fields($olLesson->ID));?>
        <div class="videoWrapper">
            <iframe width="100%" height="auto" style="min-height:500px" src="//www.youtube.com/embed/<?php echo $youtube_code;?>?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
        </div>
        <br/>
        <br/>
    </div>
    <div class="col-xs-8">
        <div>
            <h2><?php echo $olLesson->post_title;?></h2>
            <?php echo apply_filters('the_content',$olLesson->post_content);?>
        </div>
    </div>
    <div class="col-xs-4">
        <h2><a href="?course_id=0">"<?php echo $olCourse->name;?>"</a></h2>
        <hr>
        <?php
        if ( $olLessons->have_posts() ) {
            echo '<ul>';
            while ( $olLessons->have_posts() ) {
                $olLessons->the_post();
                $viewedString = is_viewed_lesson(get_the_ID()) ? ' (VIEWED) ' : ' (NOT VIEWED) ';
                if($_GET['lesson_id'] == get_the_ID()){
                    echo '<li>' . get_the_title() . $viewedString.'</li>';
                }else{
                    echo '<li><a href="?course_id='.$olCourse->term_id.'&lesson_id='.get_the_ID().'">' . get_the_title() . $viewedString. '</a></li>';
                }
            }
            echo '</ul>';
        } else {
            echo "Empty lessons list";
        }
        ?>
    </div>
</div>

<style>
    .videoWrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        padding-top: 25px;
        height: 0;
    }
    .videoWrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<script>
    function setCookie(e,o,i){i=i||{};var r=i.expires;if("number"==typeof r&&r){var t=new Date;t.setTime(t.getTime()+1e3*r),r=i.expires=t}r&&r.toUTCString&&(i.expires=r.toUTCString()),o=encodeURIComponent(o);var n=e+"="+o;for(var a in i){n+="; "+a;var m=i[a];m!==!0&&(n+="="+m)}document.cookie=n}
    setCookie('ol_lesson_' + <?php echo $olLesson->ID;?>, '1');
</script>