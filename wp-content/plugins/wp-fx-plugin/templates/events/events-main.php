<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="/wp-content/plugins/wp-option/code/webinars/assets/clndr.min.js"></script>

<div style="width: 100%">
    <div class="cal1"></div>
</div>

<script>

    var calendars = {};

    $(document).ready( function() {

        var eventArray = <?php echo json_encode($olEvents);?>;

        calendars.clndr1 = $('.cal1').clndr({
            events: eventArray,
            clickEvents: {
                click: function (target) {
                    if(target.events){
                        var _eventsHtml = '';
                        for (var i in target.events){
                            _eventsHtml += '<div style="padding:10px;"><h3>'+target.events[i].title+' at '+target.events[i].time+'</h3> <a href="'+target.events[i].link+'" target="_blank">Go to event!</a></div>';
                        }

                        if($('.events-details').length){

                            $('.events-details')
                                .find('td')
                                .wrapInner('<div style="display: block;" />')
                                .parent()
                                .find('td > div')
                                .slideUp(300, function(){
                                    $(this).parent().parent().remove();
                                    $(target.element).parent().after('<tr style="height: auto" class="events-details"><td colspan=7>'+_eventsHtml+'</td></tr>');
                                    $('.events-details')
                                        .find('td')
                                        .wrapInner('<div style="display: none;" />')
                                        .parent()
                                        .find('td > div')
                                        .slideDown(700, function(){

                                            var $set = $(this);
                                            $set.replaceWith($set.contents());

                                        });
                                });
                        }else{
                            $(target.element).parent().after('<tr style="height: auto" class="events-details"><td colspan=7>'+_eventsHtml+'</td></tr>');
                            $('.events-details')
                                .find('td')
                                .wrapInner('<div style="display: none;" />')
                                .parent()
                                .find('td > div')
                                .slideDown(300, function(){

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
</script>

<style>
    .events-details{
        border-top: 1px solid #000000;
        border-left: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    .cal1 {
        max-width:100%;
    }
    .cal1 .clndr .clndr-controls {
        display: inline-block;
        width: 100%;
        position: relative;
        margin-bottom: 10px;
    }
    .cal1 .clndr .clndr-controls .month {
        float: left;
        width: 33%;
        text-align: center;
    }
    .cal1 .clndr .clndr-controls .clndr-control-button {
        float: left;
        width: 33%;
    }
    .cal1 .clndr .clndr-controls .clndr-control-button.rightalign {
        text-align: right;
        width: 34%;
    }
    .cal1 .clndr .clndr-controls .clndr-control-button .clndr-next-button {
        cursor: pointer;
        -webkit-user-select: none;
        /* Chrome/Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE10+ */
    }
    .cal1 .clndr .clndr-controls .clndr-control-button .clndr-next-button:hover {
        background: #ddd;
    }
    .cal1 .clndr .clndr-controls .clndr-control-button .clndr-next-button.inactive {
        opacity: 0.5;
    }
    .cal1 .clndr .clndr-controls .clndr-control-button .clndr-next-button.inactive:hover {
        background: none;
        cursor: default;
    }
    .cal1 .clndr .clndr-controls .clndr-control-button .clndr-previous-button {
        cursor: pointer;
        -webkit-user-select: none;
        /* Chrome/Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE10+ */
    }
    .cal1 .clndr .clndr-controls .clndr-control-button .clndr-previous-button:hover {
        background: #ddd;
    }
    .cal1 .clndr .clndr-controls .clndr-control-button .clndr-previous-button.inactive {
        opacity: 0.5;
    }
    .cal1 .clndr .clndr-controls .clndr-control-button .clndr-previous-button.inactive:hover {
        background: none;
        cursor: default;
    }
    .cal1 .clndr .clndr-table {
        table-layout: fixed;
        width: 100%;
    }
    .cal1 .clndr .clndr-table .header-days {
        height: 30px;
        font-size: 10px;
        color: gray;
    }
    .cal1 .clndr .clndr-table .header-days .header-day {
        vertical-align: middle;
        text-align: center;
        border-left: 1px solid #000000;
        border-top: 1px solid #000000;
        color: #fff;
    }
    .cal1 .clndr .clndr-table .header-days .header-day:last-child {
        border-right: 1px solid #000000;
    }
    .cal1 .clndr .clndr-table tr {
        height: 85px;
    }
    .cal1 .clndr .clndr-table tr td {
        vertical-align: top;
    }
    .cal1 .clndr .clndr-table tr .day {
        border-left: 1px solid #000000;
        border-top: 1px solid #000000;
        width: 100%;
        height: inherit;
    }
    .cal1 .clndr .clndr-table tr .day:hover {
        background: rgba(0, 0, 0, 0.10);
    }
    .cal1 .clndr .clndr-table tr .day.today,
    .cal1 .clndr .clndr-table tr .day.my-today {
        color: red;
    }
    .cal1 .clndr .clndr-table tr .day.today:hover,
    .cal1 .clndr .clndr-table tr .day.my-today:hover {

    }
    .cal1 .clndr .clndr-table tr .day.today.event,
    .cal1 .clndr .clndr-table tr .day.my-today.event {

    }
    .cal1 .clndr .clndr-table tr .day.event,
    .cal1 .clndr .clndr-table tr .day.my-event {
        background: green;
        color: white;
        cursor: pointer;
    }
    .cal1 .clndr .clndr-table tr .day.event.past,
    .cal1 .clndr .clndr-table tr .day.my-event {
        background: rgba(0, 128, 0, 0.22);
        color: white;
        cursor: pointer;
    }
    .cal1 .clndr .clndr-table tr .day.event:hover,
    .cal1 .clndr .clndr-table tr .day.my-event:hover {

    }
    .cal1 .clndr .clndr-table tr .day.inactive,
    .cal1 .clndr .clndr-table tr .day.my-inactive {
        background: #ddd;
    }
    .cal1 .clndr .clndr-table tr .day:last-child {
        border-right: 1px solid #000000;
    }
    .cal1 .clndr .clndr-table tr .day .day-contents {
        box-sizing: border-box;
        padding: 8px;
        font-size: 12px;
        text-align: right;
    }
    .cal1 .clndr .clndr-table tr .empty,
    .cal1 .clndr .clndr-table tr .adjacent-month,
    .cal1 .clndr .clndr-table tr .my-empty,
    .cal1 .clndr .clndr-table tr .my-adjacent-month {
        border-left: 1px solid #000000;
        border-top: 1px solid #000000;
        width: 100%;
        height: inherit;
        color: gray;
    }
    .cal1 .clndr .clndr-table tr .empty:hover,
    .cal1 .clndr .clndr-table tr .adjacent-month:hover,
    .cal1 .clndr .clndr-table tr .my-empty:hover,
    .cal1 .clndr .clndr-table tr .my-adjacent-month:hover {

    }
    .cal1 .clndr .clndr-table tr .empty:last-child,
    .cal1 .clndr .clndr-table tr .adjacent-month:last-child,
    .cal1 .clndr .clndr-table tr .my-empty:last-child,
    .cal1 .clndr .clndr-table tr .my-adjacent-month:last-child {
        border-right: 1px solid #000000;
    }
    .cal1 .clndr .clndr-table tr:last-child .day,
    .cal1 .clndr .clndr-table tr:last-child .my-day {
        border-bottom: 1px solid #000000;
    }
    .cal1 .clndr .clndr-table tr:last-child .empty,
    .cal1 .clndr .clndr-table tr:last-child .my-empty {
        border-bottom: 1px solid #000000;
    }

    .clndr-next-button,
    .clndr-previous-button,
    .clndr-next-year-button,
    .clndr-previous-year-button {
        -webkit-user-select: none;
        /* Chrome/Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE10+ */
    }
    .clndr-next-button.inactive,
    .clndr-previous-button.inactive,
    .clndr-next-year-button.inactive,
    .clndr-previous-year-button.inactive {
        opacity: 0.5;
        cursor: default;
    }
</style>