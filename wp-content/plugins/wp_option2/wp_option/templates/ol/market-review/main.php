
<div id="market-review-scroller" class="scroller">
    <div class="market-review-month">
        <div class="slide-ctrl ol-angle-left" direction="back"></div>
        <ul class="months nav nav-tabs">
            <li class="active"><a href="#January" month-code="1" data-toggle="tab">January</a></li>
            <li><a href="#February" month-code="2" data-toggle="tab">February</a></li>
            <li><a href="#March" month-code="3" data-toggle="tab">March</a></li>
            <li><a href="#April" month-code="4" data-toggle="tab">April</a></li>
            <li><a href="#May" month-code="5" data-toggle="tab">May</a></li>
            <li><a href="#June" month-code="6" data-toggle="tab">June</a></li>
            <li><a href="#July" month-code="7" data-toggle="tab">July</a></li>
            <li><a href="#August" month-code="8" data-toggle="tab">August</a></li>
            <li><a href="#September" month-code="9" data-toggle="tab">September</a></li>
            <li><a href="#October" month-code="10" data-toggle="tab">October</a></li>
            <li><a href="#November" month-code="11" data-toggle="tab">November</a></li>
            <li><a href="#December" month-code="12" data-toggle="tab">December</a></li>
        </ul>
        <div class="slide-ctrl ol-angle-right" direction="forward"></div>
    </div>
    <div class="tab-content calendar">
    </div>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    $the_query = new WP_Query( array( 'post_type' => 'marketreview') );
    if ( $the_query->have_posts() ) { ?>
        <?php while ( $the_query->have_posts() ) { ?>
            <?php $the_query->the_post(); ?>

            <div class="market-report-item">
                <div class="pull-left flip">
                    <span class="day"><?php echo get_the_date("j"); ?></span><br>
                    <span class="date"><?php echo get_the_date("F, j"); ?></span>
                </div>
                <div class="market-content">
                    <h2><a class="post-title" href="<?php echo get_the_permalink(); ?>">
                            <?php echo get_the_title(); ?></a></h2>
                    <p><?php echo the_content(); ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <?php // no posts found
        /** Restore original Post Data */
        wp_reset_postdata();} ?>

</article><!-- #post-## -->


<script>

    /* <![CDATA[ */
    var ajaxpagination = {"ajaxurl":"<?php get_site_url(); ?>\/wp-admin\/admin-ajax.php"};
    /* ]]> */

    jQuery(document).ready(function ($) {
        var $months = {
            '1': 'January',
            '2': 'February',
            '3': 'March',
            '4': 'April',
            '5': 'May',
            '6': 'June',
            '7': 'July',
            '8': 'August',
            '9': 'September',
            '10': 'October',
            '11': 'November',
            '12': 'December'
        };

        $(document).on( 'click', '.market-review-month a', function( e ) {
            e.preventDefault();
            $('.calendar').empty();
            var i = $(this).attr('month-code');
            var $ul = $('<div class="slide-ctrl ol-angle-left" direction="back"></div><ul id="'+$months[i]+'" class="links tab-pane fade in" month-code="'+i+'"></ul><div class="slide-ctrl ol-angle-right" direction="forward"></div>').appendTo('.calendar');

            for (var x = 1; x <= 31; x++) {
                $('<li class="day-date"><a href="#" day-code="'+x+'">'+x+'</a></li>').appendTo($('.calendar').find('ul'));
            }

            $('.calendar ul li').find('a[day-code="1"]').trigger('click');
        });


        $(document).on( 'click', '.calendar a', function( e ) {
            e.preventDefault();

            $( ".calendar ul li" ).removeClass('active');
            $(this).parent().addClass('active');


            var $month = $(this).parent().parent().attr('month-code');
            var $day = $(this).attr('day-code');

            $.ajax({
                url: ajaxpagination.ajaxurl,
                type: 'post',
                data: {
                    action: 'ajax_pagination',
                    query_vars: ajaxpagination.query_vars,
                    month: $month,
                    day: $day
                },
                beforeSend: function() {
                    $('#main').find( 'article' ).empty();
                    $('#main').append( '<div class="page-content" id="loader">Loading New Posts...</div>' );
                },
                success: function( html ) {
                    $('#main #loader').remove();

                    if(html == '' || html == null) {
                        html = '<div class="page-content" id="loader">No market review found in current date...</div>';
                    }

                    $('#main article').append( html );

                    var $count = $(".market-report-item .day").first();

                    if($count.text().length == 1) {
                        var $old = $($count).text();
                        $($count).text('0' +$old);
                    }

                }
            })
        });


        var date = new Date();
        var month = date.getMonth();
        var day = date.getDate();
        month++;

        $( ".months li" ).each(function() {
            var $item = $(this).find('a[month-code="'+month+'"]').trigger('click');

            if($item.length) {
                var $offset = ($(".calendar ul")[0].scrollWidth / 20) * (month - 2);
                $(".months").animate({scrollLeft: $offset}, 300);
                console.log($offset);
            }
        });

        $( ".calendar ul li" ).each(function() {
            var $item = $(this).find('a[day-code="'+day+'"]').trigger('click');
            $(this).find('a[day-code="'+day+'"]').parent().addClass('active');

            if($item.length) {
                var $offset = ($(".calendar ul")[0].scrollWidth / 31) * (day - 1);
                $(".calendar ul").animate({scrollLeft: $offset}, 300);
            }
        });

        $( document ).on( "click", ".slide-ctrl", function() {
            var $direction = $(this).attr('direction');
            var $ul = $(this).parent().find('ul');

            if($direction == 'back'){
                $ul.animate({scrollLeft: $ul.scrollLeft() - 300}, 300);
                return false;
            } else {
                $ul.animate({scrollLeft: $ul.scrollLeft() + 300}, 300);
                return false;
            }
        });




    });

</script>