var calendars = {};
$(document).ready(function() {
    var eventArray = <?php echo json_encode($olEvents);?>;
    calendars.clndr1 = $('.cal1').clndr({
        events: eventArray,
        clickEvents: {
            click: function(target) {
                if (target.events) {
                    var _eventsHtml = '';
                    for (var i in target.events) {
                        _eventsHtml += '<div style="padding:10px;"><h3>' + target.events[i].title + ' at ' + target.events[i].time + '</h3> <a href="' + target.events[i].link + '" target="_blank">Go to event!</a></div>';
                    }
                    if ($('.events-details').length) {
                        $('.events-details').find('td').wrapInner('<div style="display: block;" />').parent().find('td > div').slideUp(300, function() {
                            $(this).parent().parent().remove();
                            $(target.element).parent().after('<tr style="height: auto" class="events-details"><td colspan=7>' + _eventsHtml + '</td></tr>');
                            $('.events-details').find('td').wrapInner('<div style="display: none;" />').parent().find('td > div').slideDown(700, function() {
                                var $set = $(this);
                                $set.replaceWith($set.contents());
                            });
                        });
                    } else {
                        $(target.element).parent().after('<tr style="height: auto" class="events-details"><td colspan=7>' + _eventsHtml + '</td></tr>');
                        $('.events-details').find('td').wrapInner('<div style="display: none;" />').parent().find('td > div').slideDown(300, function() {
                            var $set = $(this);
                            $set.replaceWith($set.contents());
                        });
                        console.log(target.events);
                    }
                    console.log(target.events);
                }
            }
        },
        multiDayEvents: {
            singleDay: 'date',
            endDate: 'endDate',
            startDate: 'startDate'
        },
        showAdjacentMonths: true,
        adjacentDaysChangeMonth: false
    });
});