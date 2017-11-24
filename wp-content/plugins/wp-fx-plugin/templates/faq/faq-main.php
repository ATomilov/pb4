<div class="faq">
        <div class="row">
              <div class="col-sm-12">
                <div class="faq-section">
                <?php
				$terms = get_terms(
					'question_type', array(
						'hide_empty' => true,
					)
				);
				foreach ( $terms as $term ) :
					echo '<h3>' . $term->name . '</h3>';
					$args      = array(
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
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						?>
						<div class="faq_item">
							<a href="#collapse<?php the_ID(); ?>">
								<?php the_title(); ?>
							</a>
							<div id="collapse<?php the_ID(); ?>" class="faq_info_exp">
                                <?php the_content(); ?>
                            </div>
						</div>
						<?php

					endwhile;
					wp_reset_postdata();
				endforeach;

				?>

				</div>
			</div>
		</div>
	</div>
