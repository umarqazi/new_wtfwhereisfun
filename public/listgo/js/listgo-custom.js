
/*****************************************************************************
 *************************Remove Photo From Event Edit Page*****************************
 ******************************************************************************/
function getTimeLocation(obj){
    var locationId = $(obj).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/get-time-location",
        type : "POST",
        data : {location_id : locationId},
        dataType : "JSON",
        success: function(response)
        {
            if(response.type == 'success'){
                var id = $('#location_map .event-maps').attr('id');
                map = new google.maps.Map(document.getElementById(id), {
                    zoom : 8,
                    center : {lat : parseFloat(response.data.latitude), lng : parseFloat(response.data.longitude)},
                    type : 'ROADMAP'
                });

                var marker = new google.maps.Marker({
                    position : {lat : parseFloat(response.data.latitude), lng : parseFloat(response.data.longitude)},
                    map : map,
                    draggable : true
                });
            }
        }
    });
}
/*****************************************************************************
 *************************End Remove Photo From Event Edit Page*****************************
 ******************************************************************************/
