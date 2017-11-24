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
        <p>
        	<?php echo the_content(); ?>	
        </p>
    </div>
</div>