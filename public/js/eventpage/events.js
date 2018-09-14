$(document).ready(function($) {
    $("#event-create").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#event-create')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#event-create .form-error').html('');
                $('#event-create .btn-save').attr('disabled',true).text('Loading....');
            },
            success: function(response){
                if(response.type == "success"){
                    $('#event-create')[0].reset();
                    showToaster('success',response.msg);
                    setTimeout(function(){
                        window.location.href = base_url()+'/events/'+response.data.encoded_id+'/edit';
                    }, 3000);
                }
                else{
                    showToaster('error',response.msg);
                }
                $('#event-create .btn-save').attr('disabled',false).text('Next');
            },
            error:function(response)
            {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys   = Object.keys(errors);
                var count  = keys.length;
                for (var i = 0; i < count; i++)
                {
                    $('#event-create .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#event-create .btn-save').attr('disabled',false).text('Next');
            }
        });
    });

    $("#event-details").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#event-details')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events/update-details",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#event-details .form-error').html('');
                $('#event-details .btn-save').attr('disabled',true).text('Loading....');
            },
            success: function(response){
                if(response.type == "success"){
                    showToaster('success',response.msg);
                }
                else{
                    showToaster('error',response.msg);
                }
                $('#event-details .btn-save').attr('disabled',false).text('Next');
            },
            error:function(response)
            {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys   = Object.keys(errors);
                var count  = keys.length;
                for (var i = 0; i < count; i++)
                {
                    $('#event-create .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#event-details .btn-save').attr('disabled',false).text('Next');
            }
        });
    });

    $("#event-topics").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#event-topics')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events/update-topics",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#event-topics .form-error').html('');
                $('#event-topics .btn-save').attr('disabled',true).text('Loading....');
            },
            success: function(response){
                if(response.type == "success"){
                    showToaster('success',response.msg);
                }
                else{
                    showToaster('error',response.msg);
                }
                $('#event-topics .btn-save').attr('disabled',false).text('Next');
            },
            error:function(response)
            {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys   = Object.keys(errors);
                var count  = keys.length;
                for (var i = 0; i < count; i++)
                {
                    $('#event-create .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#event-topics .btn-save').attr('disabled',false).text('Next');
            }
        });
    });
});


    /*****************************************************************************
     *************************Event Location Form **************************
     ******************************************************************************/
    function eventLocationForm(event, obj, type){
        event.preventDefault();
        var form_data = new FormData($(obj)[0]);
        var id = '#'+$(obj).attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events/update-time-location",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $(id+' .form-error').html('');
                $(id+' .btn-save').attr('disabled',true).text('Loading....');
                $(id+' :input').prop('disabled', true);
            },
            success: function(response){
                if(response.type == "success"){
                    showToaster('success',response.msg);
                }
                else{
                    showToaster('error',response.msg);
                }
                $(id+' .btn-save').css('display', 'none');
                $(id+' .btn-edit').css('display', 'block').prop('disabled', false);
                $(id+' .time-location-id').attr('value', response.data.id);
                $(id+' .request-type').attr('value', 'update');
                $('.add-another-location').css('display', 'block');
            },
            error:function(response)
            {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys   = Object.keys(errors);
                var count  = keys.length;
                for (var i = 0; i < count; i++)
                {
                    $(id +' .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $(id+' .btn-save').attr('disabled',false).text('Save');
            }
        });
    }


    /*****************************************************************************
     *************************Event Tickets Form **************************
     ******************************************************************************/

    function eventTicketForm(event, obj){
        event.preventDefault();
        var formData = new FormData($(obj)[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events/update-ticket",
            type : "POST",
            data : formData,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $(obj).find('.form-error').html('');
                $(obj).find('.btn-save').attr('disabled',true).text('Loading....');
                $(obj).find(':input').prop('disabled', true);
                $(obj).removeClass('form-editable');
            },
            success: function(response){
                if(response.type == "success"){
                    showToaster('success',response.msg);
                }
                else{
                    showToaster('error',response.msg);
                }
                $(obj).find('.btn-edit').css('display', 'inline-block').prop('disabled', false);
                $(obj).find('.ticket-id').attr('value', response.data.id);
                $(obj).find('.request-type').attr('value', 'edit');
                $(obj).find('.btn-save').text('Save').css('display','none');
                var eventId = $('#new-ticket-buttons paid_ticket_btn').attr('data-event-id');
                $('#new-ticket-buttons .paid_ticket_btn').attr('onclick', 'addNewTicket(this,"Paid",'+ eventId+')');
                $('#new-ticket-buttons .donation_btn').attr('onclick', 'addNewTicket(this,"Donation",'+ eventId+')');
                $('#new-ticket-buttons .free_ticket_btn').attr('onclick', 'addNewTicket(this,"Free",'+ eventId+')');
                $(obj).find('.action_list .add-pass').css('display','block');
            },
            error:function(response)
            {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys   = Object.keys(errors);
                var count  = keys.length;
                for (var i = 0; i < count; i++)
                {
                    $(obj).find('.'+keys[i]).html(errors[keys[i]]).focus();
                }
                $(obj).find(':input').prop('disabled', false).css('background-color', '#fff!important');
                $(obj).find('.btn-save').attr('disabled',false).text('Save');
                $(obj).addClass('form-editable');
            }
        });
    }


    function addNewTicket(obj, type, eventId){
        var formData = { event_id : eventId, type : type};
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events/add-new-ticket",
            type : "POST",
            data : formData,
            dataType : "JSON",
            beforeSend:function(){
                $('#new-ticket-buttons a').removeAttr('onclick');
            },
            success: function(response)
            {
                $('.new-tickets').prepend(response.data);
            }
        });
    }

    function editEventTicketForm(obj){
        var formElement = $(obj).closest("form");
        formElement.addClass('form-editable').find(':input').removeAttr('disabled');
        $('#new-ticket-buttons a').removeAttr('onclick');
        formElement.find('.btn-save').css('display','inline-block');
        formElement.find('.btn-edit').css('display','none');
    }

    function changeTicketStatus(event, obj, type){
        event.preventDefault();
        $(obj).parent().find('a').removeAttr('class');
        $(obj).attr('class', 'active');
        $(obj).parent().find('input').val(type);
    }

    function changeTicketAvailability(event, obj, type){
        event.preventDefault();
        $(obj).parent().find('a').removeClass('active');
        $(obj).addClass('active');
        $(obj).parent().find('input').val(type);
    }

    function deleteTicket(event, obj){
        event.preventDefault();
        var formElement = $(obj).closest("form");
        var ticketId = formElement.find('.ticket-id').attr('value');
        formElement.parent('div').remove();
        var attr = $('#new-ticket-buttons .paid_ticket_btn').attr('onclick');
        // For some browsers, `attr` is undefined; for others, `attr` is false. Check for both.
        if (typeof attr !== typeof undefined && attr !== false) {
            // Element has this attribute
        }else{
            var eventId = $('#new-ticket-buttons paid_ticket_btn').attr('data-event-id');
            $('#new-ticket-buttons .paid_ticket_btn').attr('onclick', 'addNewTicket(this,"Paid",'+ eventId+')');
            $('#new-ticket-buttons .donation_btn').attr('onclick', 'addNewTicket(this,"Donation",'+ eventId+')');
            $('#new-ticket-buttons .free_ticket_btn').attr('onclick', 'addNewTicket(this,"Free",'+ eventId+')');
        }

        if(ticketId != ''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url  : base_url() + "/events/delete-ticket",
                type : "POST",
                data : {ticket_id : ticketId},
                dataType : "JSON",
                success: function(response)
                {
                    if(response.type == "success"){
                        showToaster('success', 'Ticket Deleted Successfully');
                    }
                }
            });
        }
    }

    function addNewTicketPass(event, obj, ticketId){
        if($(obj).closest('.ticket-passes-wrapper').has('.event-passes-heading')){
            formData = {ticket_id : ticketId, first : false}
        }else{
            formData = {ticket_id : ticketId, first : true}
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events/add-new-ticket-pass",
            type : "POST",
            data : formData,
            dataType : "JSON",
            success: function(response)
            {
                $('.ticket-passes-wrapper').append(response.data);
            }
        });
    }

    function editEventTicketPassForm(obj){
        var formElement = $(obj).closest("form");
        formElement.addClass('form-editable').find(':input').removeAttr('disabled');
        formElement.find('.btn-save').css('display','block');
        formElement.find('.btn-edit').css('display','none');
    }

    function updateTicketPass(event, obj){
        event.preventDefault();
        var formData = new FormData($(obj)[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events/update-pass",
            type : "POST",
            data : formData,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $(obj).find('.form-error').html('');
                $(obj).find(':input').prop('disabled', true);
                $(obj).removeClass('form-editable');
            },
            success: function(response){
                if(response.type == "success"){
                    showToaster('success',response.msg);
                }
                else{
                    showToaster('error',response.msg);
                }
                $(obj).find('.btn-save').css('display', 'none').text('Save');
                $(obj).find('.btn-edit').css('display', 'block').prop('disabled', false);
                $(obj).find('.pass-id').attr('value', response.data.id);
                $(obj).find('.request-type').attr('value', 'edit');
            },
            error:function(response)
            {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys   = Object.keys(errors);
                var count  = keys.length;
                for (var i = 0; i < count; i++)
                {
                    $(obj).find('.'+keys[i]).html(errors[keys[i]]).focus();
                }
                $(obj).find(':input').prop('disabled', false).css('background-color', '#fff!important');
                $(obj).find('.btn-save').attr('disabled',false).text('Save');
                $(obj).addClass('form-editable');
            }
        });
    }

    function deleteTicketPass(event, obj){
        event.preventDefault();
        var formElement = $(obj).closest("form");
        var passId = formElement.find('.pass-id').attr('value');
        formElement.parent('div').remove();
        if(passId != ''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url  : base_url() + "/events/delete-pass",
                type : "POST",
                data : {pass_id : passId},
                dataType : "JSON",
                success: function(response)
                {
                    if(response.type == "success"){
                        showToaster('success', 'Pass Deleted Successfully');
                    }
                }
            });
        }
    }

/*****************************************************************************
 *************************Change Password Script End **************************
 ******************************************************************************/

$(document).on('change','#event_on_off',function() {
    if($(this).is(':checked') == true) {

        $('.on-off').removeClass('hidden');
        $('#location_box_main').addClass('hidden');
        $('.addAnother_event_location').addClass('hidden');
        $('#on_off_event').val(1);

    } else {
        $('.on-off').addClass('hidden');
        $('#location_box_main').removeClass('hidden');
        $('.addAnother_event_location').removeClass('hidden');
        $('#on_off_event').val(0);

    }
});

/* Event Access */
$(document).ready(function(){
    $('.unlisted_toogle').click(function(){
        $(".social-buttons-toggle").css('display','block');
        $('#event_show').val('unlisted');
    });

    $('.public_toggle').click(function(){
        $(".social-buttons-toggle").css('display','none');
        $('#event_show').val('public');
    });

    $('#datetimepicker1,#datetimepicker2').datetimepicker({
        useCurrent: false,
        format:'YYYY-MM-DD HH:mm:ss',
        allowInputToggle: true,
        minDate: moment()
    });

    $(document).on('click',".datepicker1, .datepicker2", function(e){
        //bind to all instances of class "date".
        $(this).datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD HH:mm:ss',
            allowInputToggle: true,
            minDate: moment()
        });
    });

    // $('#enddate').datetimepicker().on('dp.change', function (e) {
    //     var decrementDay = moment(new Date(e.date));
    //     decrementDay.subtract(1, 'days');
    //     $('#datetimepicker1').data('DateTimePicker').maxDate(decrementDay);
    //     $(this).data("DateTimePicker").hide();
    // });
});

$(document).on('change','#hide_date_from_ticket',function() {
    if($(this).is(':checked') == true) {

        $('#hide_date_event').val('Y');

    } else {

        $('#hide_date_event').val('N');

    }
});

$(document).on('change','select#event_topic',function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url:  base_url()+'/get-event-sub-topics',
        data: {event_topic: $('select#event_topic').val()},
        dataType:'json',
        beforeSend:function(){
            $('#event_sub_topic').find('option').not(':first').remove();
            $('#event_sub_topic').attr('disabled', true);
        },
        success: function(response){
            $('#event_sub_topic').append(response).removeAttr('disabled');
        }
    });
});

    function searchLocation(event, obj){
        // event.preventDefault();
        if (event.keyCode === 13) {
            event.preventDefault();
        }
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById($(obj).attr('id')));
        google.maps.event.addListener(autocomplete, 'place_changed', function(){
            var place = autocomplete.getPlace();
            if(!place.geometry)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url  : base_url() + "/events/maps-search",
                    type : "POST",
                    data : {location : $('#event_location').val()},
                    dataType : "JSON",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(location)
                    {
                        var latLng = new google.maps.LatLng(location.latitude, location.longitude);
                        maps[0].map.setCenter(latLng);
                        new google.maps.Marker({position: latLng, map: maps[0].map, draggable: true});
                        $(obj).parent().find('#event_lat').val(place.geometry.location.lat());
                        $(obj).parent().find('#event_lng').val(place.geometry.location.lng());
                        $(obj).parent().next().find('#event_address').val($(obj).val());
                        return false;
                    }
                });
            }
            else
            {
                maps[0].map.setCenter(place.geometry.location);
                maps[0].markers[0].setPosition(place.geometry.location);
                $(obj).parent().find('#event_lat').val(place.geometry.location.lat());
                $(obj).parent().find('#event_lng').val(place.geometry.location.lng());
                $(obj).parent().next().find('#event_address').val($(obj).val());
                return false;
            }
        });
    }


    function addNewLocationRow(obj){
        var element = $(obj).parent().prev().find('input[name=event_id]');
        var eventID = element.attr('value');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/events/add-new-location-row",
            type : "POST",
            data : {event_id : eventID},
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function(response)
            {
                $('.time-location-rows').append(response.data);
                // console.log(response.data)
            }
        });
    }

