/* <![CDATA[ */
var ajaxpagination = {
    "ajaxurl": "<?php get_site_url();?>\/wp-admin\/admin-ajax.php"
};
/* ]]> */
jQuery(document).ready(function($) {
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
    $(document).on('click', '.market-review-month a', function(e) {
        e.preventDefault();
        $('.calendar').empty();
        var i = $(this).attr('month-code');
        var $ul = $('<div class="slide-ctrl ol-angle-left" direction="back"></div><ul id="' + $months[i] + '" class="links tab-pane fade in" month-code="' + i + '"></ul><div class="slide-ctrl ol-angle-right" direction="forward"></div>').appendTo('.calendar');
        for (var x = 1; x <= 31; x++) {
            $('<li class="day-date"><a href="#" day-code="' + x + '">' + x + '</a></li>').appendTo($('.calendar').find('ul'));
        }
        $('.calendar ul li').find('a[day-code="1"]').trigger('click');
    });
    $(document).on('click', '.calendar a', function(e) {
        e.preventDefault();
        $(".calendar ul li").removeClass('active');
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
                $('#main').find('article').empty();
                $('#main').append('<div class="page-content" id="loader">Loading New Posts...</div>');
            },
            success: function(html) {
                $('#main #loader').remove();
                if (html == '' || html == null) {
                    html = '<div class="page-content" id="loader">No market review found in current date...</div>';
                }
                $('#main article').append(html);
                var $count = $(".market-report-item .day").first();
                if ($count.text().length == 1) {
                    var $old = $($count).text();
                    $($count).text('0' + $old);
                }
            }
        })
    });
    var date = new Date();
    var month = date.getMonth();
    var day = date.getDate();
    month++;
    $(".months li").each(function() {
        var $item = $(this).find('a[month-code="' + month + '"]').trigger('click');
        if ($item.length) {
            var $offset = ($(".calendar ul")[0].scrollWidth / 20) * (month - 2);
            $(".months").animate({
                scrollLeft: $offset
            }, 300);
            console.log($offset);
        }
    });
    $(".calendar ul li").each(function() {
        var $item = $(this).find('a[day-code="' + day + '"]').trigger('click');
        $(this).find('a[day-code="' + day + '"]').parent().addClass('active');
        if ($item.length) {
            var $offset = ($(".calendar ul")[0].scrollWidth / 31) * (day - 1);
            $(".calendar ul").animate({
                scrollLeft: $offset
            }, 300);
        }
    });
    $(document).on("click", ".slide-ctrl", function() {
        var $direction = $(this).attr('direction');
        var $ul = $(this).parent().find('ul');
        if ($direction == 'back') {
            $ul.animate({
                scrollLeft: $ul.scrollLeft() - 300
            }, 300);
            return false;
        } else {
            $ul.animate({
                scrollLeft: $ul.scrollLeft() + 300
            }, 300);
            return false;
        }
    });
});