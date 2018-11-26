function changeEventReports(obj, id){
    $('.event-button-bar').find('.active').removeClass('active');
    $('.event-button-bar').find('#'+id).addClass('active');
    if(id == 7){
        $('.total-events-count').text($('#weekCount').val());
        $('.total-earnings-sum').text($('#weekEarning').val());
    }else if(id == 30){
        $('.total-events-count').text($('#monthCount').val());
        $('.total-earnings-sum').text($('#monthEarning').val());
    }else{
        $('.total-events-count').text($('#yearCount').val());
        $('.total-earnings-sum').text($('#yearEarning').val());
    }
}