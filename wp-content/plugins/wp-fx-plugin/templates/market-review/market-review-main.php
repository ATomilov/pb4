<div id="market-review-scroller" class="scroller">
    <div class="market-review-month">
        <div class="slide-ctrl ol-angle-left" direction="back"></div>
        <ul class="months nav nav-tabs">
            <li class="active">
                <a href="#January" month-code="1" data-toggle="tab">
                    <?php echo _e("January", 'ol_plugin'); ?>
                </a>
            </li>
            <li>
                <a href="#February" month-code="2" data-toggle="tab">
                    <?php echo _e("February", 'ol_plugin'); ?>
                </a>
            </li>
            <li>
                <a href="#March" month-code="3" data-toggle="tab">
                    <?php echo _e("March", 'ol_plugin'); ?>
                </a>
            </li>
            <li>
                <a href="#April" month-code="4" data-toggle="tab">
                    <?php echo _e("April", 'ol_plugin'); ?>
                </a>
            </li>
            <li>
                <a href="#May" month-code="5" data-toggle="tab">
                    <?php echo _e("May", 'ol_plugin'); ?> 
                </a>
            </li>
            <li>
                <a href="#June" month-code="6" data-toggle="tab">
                    <?php echo _e("June", 'ol_plugin'); ?>   
                </a>
            </li>
            <li>
                <a href="#July" month-code="7" data-toggle="tab">
                    <?php echo _e("July", 'ol_plugin'); ?>
                </a>
            </li>
            <li>
                <a href="#August" month-code="8" data-toggle="tab">
                    <?php echo _e("August", 'ol_plugin'); ?>  
                </a>
            </li>
            <li>
                <a href="#September" month-code="9" data-toggle="tab">
                    <?php echo _e("September", 'ol_plugin'); ?>
                </a>
            </li>
            <li>
                <a href="#October" month-code="10" data-toggle="tab">
                    <?php echo _e("October", 'ol_plugin'); ?>
                </a>
            </li>
            <li>
                <a href="#November" month-code="11" data-toggle="tab">
                    <?php echo _e("November", 'ol_plugin'); ?>  
                </a>
            </li>
            <li>
                <a href="#December" month-code="12" data-toggle="tab">
                    <?php echo _e("December", 'ol_plugin'); ?>   
                </a>
            </li>
        </ul>
        <div class="slide-ctrl ol-angle-right" direction="forward"></div>
    </div>
    <div class="tab-content calendar"></div>
</div>

<article id="post-<?php the_ID();?>" <?php post_class();?>>

    <?php
        $the_query = new WP_Query(array('post_type' => 'marketreview'));
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
                $the_query->the_post();?>
                <div class="market-report-item">
                    <div class="pull-left flip">
                        <span class="day"><?php echo get_the_date("j"); ?></span><br>
                        <span class="date"><?php echo get_the_date("F, j"); ?></span>
                    </div>
                    <div class="market-content">
                        <h2>
                            <a class="post-title" href="<?php echo get_the_permalink(); ?>">
                                <?php echo get_the_title(); ?>
                            </a>
                        </h2>
                        <p><?php echo the_content(); ?></p>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php else :
            echo "Posts not found";
            wp_reset_postdata();
        endif;?>

</article>