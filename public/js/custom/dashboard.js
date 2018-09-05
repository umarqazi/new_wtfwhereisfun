$(document).ready(function(){
    $('.event-filters .button-bar').click(function(e){
        var days = $(this).attr('id');
        var object = $(this);
        $.ajax({
            url: base_url() + "event-stats",
            type: "POST",
            data: {days: days},
            dataType: "JSON",
            success: function (response) {
                $('.event-filters .button-bar.active').removeClass('active');
                object.addClass('active');
                $('.total-events .number').text(response.total_events)
                $('.total-earnings .number').text(response.total_earning)

            }
        });
    });

});