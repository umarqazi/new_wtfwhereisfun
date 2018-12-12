function showEventDetails(event){
    jQuery.noConflict();
    var eventTitle      = '<a href="'+ base_url()+'/events/'+ event.data.event.encrypted_id+'/'+ event.data.encrypted_id+'">' + event.data.event.title +'</a>';
    var eventStarting   = moment(event.data.starting);
    var eventEnding     = moment(event.data.ending);
    var eventDates      = '<i class="fa fa-calendar green"></i>   '+ eventStarting.format('ddd, MMM DD') + ' - ' + eventEnding.format('ddd, MMM DD');
    var eventTimes      = '<i class="fa fa-clock green"></i>    '+ eventStarting.format('hh:mm A') + ' - ' + eventEnding.format('hh:mm A');
    var eventLocaiton   = '<i class="fa fa-map-marker green"></i>   ' + event.data.location;
    var eventClickLink  = base_url()+'/events/'+ event.data.event.encrypted_id+'/'+ event.data.encrypted_id;

    if(event.data.event.header_image !== null){
        var imgSrc      = event.data.event.directory+event.data.event.header_image;
    }else{
        var imgSrc      = emptyImg;
    }

    $('#event-details .title strong').html(eventTitle);
    $('#event-details .date strong').html(eventDates);
    $('#event-details .time strong').html(eventTimes);
    $('#event-details .location strong').html(eventLocaiton);
    $('#event-details .event-view-btn').attr('href', eventClickLink);
    $('#event-details .img-holder img').attr('src', imgSrc);
    $('#event-details').modal('show');

}