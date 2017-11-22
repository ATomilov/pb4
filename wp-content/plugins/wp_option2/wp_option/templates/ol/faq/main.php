<div class="faq">
        <div class="row">
              <div class="col-sm-12">
                <div class="faq-section">

                <?php
                $terms = get_terms( 'question_type', array(
                    'hide_empty' => true,
                ) );
                foreach($terms as $term){
                    //var_dump($term);
                    echo '<h3>'.$term->name.'</h3>';
                    $args = array(
                        'post_type' => 'question',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'question_type',
                                'field'    => 'term_id',
                                'terms'    => array( $term->term_id ),
                            ),
                        ),
                    );
                    $the_query = new WP_Query( $args );
                    wp_reset_postdata();
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                        <p><a data-toggle="collapse" href="#collapse<?php the_ID();?>" class="heading-collapse"><?php the_title();?></a></p>
                        <div id="collapse<?php the_ID();?>" class="collapse">
                            <?php the_content();?>
                        </div>
                        <?php
        
                    }
                }

                ?>
                     
                </div>
            </div>
        </div><!--row-->       
        <p><!-- end row --></p>       
    </div>
<script type="text/javascript">

    (function($) {
 
    })(jQuery);
</script>