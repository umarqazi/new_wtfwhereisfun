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
                nextTab();
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
                nextTab();
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
        },
        success: function(response){
            if(response.type == "success"){
                showToaster('success',response.msg);
            }
            else{
                showToaster('error',response.msg);
            }
            $(obj).find('.ticket-id').attr('value', response.data.id);
            var addNewPass = '<a href="javascript:void(0);" class="add-pass" onclick="addNewTicketPass(event,this,'+ response.data.id+')" title="Connect Pass"><i class="fa fa-plus"></i></a>';
            $(obj).find('.event-passes-heading h4').append(addNewPass);
            $(obj).find('.request-type').attr('value', 'edit');
            var eventId = $('#new-ticket-buttons paid_ticket_btn').attr('data-event-id');
            $('#new-ticket-buttons .paid_ticket_btn').attr('onclick', 'addNewTicket(this,"Paid",'+ eventId+')');
            $('#new-ticket-buttons .donation_btn').attr('onclick', 'addNewTicket(this,"Donation",'+ eventId+')');
            $('#new-ticket-buttons .free_ticket_btn').attr('onclick', 'addNewTicket(this,"Free",'+ eventId+')');
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
        }
    });
}

/*****************************************************************************
 *************************Move towards next tab **************************
 ******************************************************************************/
function nextTab(){
    var currentId = $('.member-card ul.nav-pills .active').find('a').attr('href');
    var nextId = $('.member-card ul.nav-pills .active').next('li').find('a').attr('href');
    $('.member-card ul.nav-pills .active').removeClass('active').next('li').addClass('active');
    $(currentId).removeClass('active');
    $(nextId).addClass('active');
}

/*****************************************************************************
 *************************Add New Tickets Form**************************
 ******************************************************************************/
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

/*****************************************************************************
 *************************Delete Event Ticket Form **************************
 ******************************************************************************/
function deleteTicket(event, obj){
    event.preventDefault();
    var formElement = $(obj).closest("form");
    var ticketId = formElement.find('.ticket-id').attr('value');
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
                    formElement.closest('.ticket-main-wrapper').remove();
                    showToaster('success', 'Ticket Deleted Successfully');
                }
            }
        });
    }
}

/*****************************************************************************
 *************************Open Event Ticket's Setting Tab**************************
 ******************************************************************************/
function eventTicketSettings(event, obj){
    $(obj).closest('ul').closest('form').next('div.ticket-passes-wrapper').addClass('hidden');
    if($(obj).closest('ul').next('div').hasClass('hidden')){
        $(obj).closest('ul').next('div').removeClass('hidden');
    }else{
        $(obj).closest('ul').next('div').addClass('hidden');
    }
}

/*****************************************************************************
 *************************Make Copy of current Ticket**************************
 ******************************************************************************/
function copyEventTicket(event, obj){
    var passContent = '<div class="col-md-12 no-passes"><p>Currenty there are no passes for this ticket</p></div>';
    copiedElement = $(obj).closest('.ticket-main-wrapper').clone(true);
    copiedElement.find('.request-type').attr('value', 'store');
    copiedElement.find('.ticket-id').attr('value', '');
    copiedElement.find('.ticket-passes-wrapper').find('.ticket-pass').empty().append(passContent);
    copiedElement.find('.ticket-passes-wrapper').find('a.add-pass').remove();
    $(obj).closest('.ticket-main-wrapper').after(copiedElement);
}

function eventTicketPasses(event, obj){
    $(obj).closest('ul').next('div').addClass('hidden');
    if($(obj).closest('ul').closest('div.ticket-main-wrapper').find('div.ticket-passes-wrapper').hasClass('hidden')){
        $(obj).closest('ul').closest('div.ticket-main-wrapper').find('div.ticket-passes-wrapper').removeClass('hidden');
    }else{
        $(obj).closest('ul').closest('div.ticket-main-wrapper').find('div.ticket-passes-wrapper').addClass('hidden');
    }
}

function addNewTicketPass(event, obj, ticketId){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/add-new-ticket-pass",
        type : "POST",
        data : {ticket_id : ticketId},
        dataType : "JSON",
        beforeSend : function(){
            var divCheck = $(obj).closest('.ticket-passes-wrapper').find('.ticket-pass div');
            if(divCheck.hasClass('no-passes')){
                divCheck.remove('.no-passes');
            }
        },
        success: function(response)
        {
            $(obj).closest('.event-passes-heading').next('.ticket-pass').append(response.data);
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
        },
        success: function(response){
            if(response.type == "success"){
                showToaster('success',response.msg);
            }
            else{
                showToaster('error',response.msg);
            }
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

