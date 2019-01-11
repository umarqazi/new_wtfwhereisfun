$(document).ready(function($) {
    // toggle tickets details

    $('.tickets-table .ticket-details button').click(function (){
        $(this).parent().parent().next('.ticket_description_wrapper').slideToggle();
    });

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
                // $('#event-create .btn-save').attr('disabled',true).text('Loading....');
            },
            success: function(response){
                if(response.type == "success"){
                    $('#event-create')[0].reset();
                    window.location.href = base_url()+'/events/'+response.data.encoded_id+'/edit';
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
                    nextTab();
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
                    $('#event-details .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#event-details .btn-save').attr('disabled',false).text('Next');
            }
        });
    });

    $('#event-topics').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
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
                    nextTab();
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
                    $('#event-topics .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#event-topics .btn-save').attr('disabled',false).text('Next');
            }
        });
    });
});


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
            var eventId = $('#new-ticket-buttons .paid_ticket_btn').attr('data-event-id');
            $('#new-ticket-buttons .paid_ticket_btn').attr('onclick', 'addNewTicket(this,"Paid","'+ eventId+'")');
            $('#new-ticket-buttons .donation_btn').attr('onclick', 'addNewTicket(this,"Donation","'+ eventId+'")');
            $('#new-ticket-buttons .free_ticket_btn').attr('onclick', 'addNewTicket(this,"Free","'+ eventId+'")');
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
function promptForDetails(event, obj){
    event.preventDefault();
    showToaster('error', 'Complete event details first to move forward');
}

function nextTab(){
    var currentId = $('.member-card ul.nav-pills .active').find('a').attr('href');
    var nextId = $('.member-card ul.nav-pills .active').next('li').find('a').attr('href');
    $('.member-card ul.nav-pills .active').removeClass('active').next('li').addClass('active');
    $(currentId).removeClass('active in');
    $(nextId).addClass('active in');
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
            $('#new-ticket-buttons a').attr('onclick', 'showDisabledButtonPopup()');
        },
        success: function(response)
        {
            $('.new-tickets').prepend(response.data);
        }
    });
}

function showDisabledButtonPopup(){
    $('.ticket-popup #disabled-buttons').css('visibility', 'visible');
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
        var eventId = $('#new-ticket-buttons .paid_ticket_btn').attr('data-event-id');
        $('#new-ticket-buttons .paid_ticket_btn').attr('onclick', 'addNewTicket(this,"Paid","'+ eventId+'")');
        $('#new-ticket-buttons .donation_btn').attr('onclick', 'addNewTicket(this,"Donation","'+ eventId+'")');
        $('#new-ticket-buttons .free_ticket_btn').attr('onclick', 'addNewTicket(this,"Free","'+ eventId+'")');
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

    formElement.closest('.ticket-main-wrapper').remove();
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
 *************************Select Event Layout**************************
 ******************************************************************************/
function selectLayout(obj){
    $(obj).closest('.layout-listing').find('.active').removeClass('active');
    $(obj).addClass('active');
    $(obj).closest('.layout-listing').find('input#event_layout_id').attr('value', $(obj).attr('id'));
}

/*****************************************************************************
 *************************Update Event Layout**************************
 ******************************************************************************/
function updateEventLayout(event, obj){
    event.preventDefault();
    var formData = new FormData($(obj)[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/update-layout",
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
                $('#event-layout #header_image_exist').attr('value', response.data.header_image);
                showToaster('success',response.msg);
            }
            else{
                showToaster('error',response.msg);
            }
        },
        error:function(response)
        {
            var respObj = response.responseJSON;
            errors = respObj.errors;
            var keys   = Object.keys(errors);
            showToaster('error', errors[keys[0]]);
        }
    });
}

/*****************************************************************************
 *************************Change Password Script End **************************
 ******************************************************************************/

$(document).on('change','#event_on_off',function() {
    if($(this).is(':checked') == true) {

        $('.on-off').removeClass('hidden');
        $('#location_box_main').addClass('hidden');
        // $('.addAnother_event_location').addClass('hidden');
        $('#on_off_event').val(1);

    } else {
        $('.on-off').addClass('hidden');
        $('#location_box_main').removeClass('hidden');
        // $('.addAnother_event_location').removeClass('hidden');
        $('#on_off_event').val(0);

    }
});

/* Event Access */
$(document).ready(function(){
    $('.unlisted_toogle').click(function(){
        $(".social-buttons-toggle").css('display','block');
        $('#event_show').val('unlisted');
        $('.public_toggle').removeClass('active');
        $('.unlisted_toogle').addClass('active');
    });

    $('.public_toggle').click(function(){
        $(".social-buttons-toggle").css('display','none');
        $('#event_show').val('public');
        $('.unlisted_toogle').removeClass('active');
        $('.public_toggle').addClass('active');
    });

    $('#datetimepicker1,#datetimepicker2').datetimepicker({
        useCurrent: false,
        format:'YYYY-MM-DD hh:mm A',
        allowInputToggle: true,
        minDate: 0

    });

    $(document).on('click',".datepicker1,.datepicker2", function(e){
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

$(document).on('change','select#event_sub_topic',function() {
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

/*****************************************************************************
 *************************Event Location Form **************************
 ******************************************************************************/
function eventLocationForm(event, obj, type){
    event.preventDefault();
    var form_data = new FormData($(obj)[0]);
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
            $(obj).find('.form-error').html('');
        },
        success: function(response){
            if(response.type == "success"){
                showToaster('success',response.msg);
            }
            else{
                showToaster('error',response.msg);
            }
            $(obj).find('.time-location-id').attr('value', response.data.timeLocation.id);
            $(obj).find('.request-type').attr('value', 'update');
            console.log(response.data.count);
            if(response.data.count == 1){
                $('#event-preview-button').attr('href', response.data.link).removeAttr('onclick');
            }
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
            $(obj).find('.btn-save').attr('disabled',false).text('Save');
        }
    });
}

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
                    var id = $(obj).closest('form').find('#location_map .event-maps').attr('id');
                    map = new google.maps.Map(document.getElementById(id), {
                        zoom : 8,
                        center : latLng,
                        type : 'ROADMAP'
                    });

                    var marker = new google.maps.Marker({
                        position : latLng,
                        map : map,
                        draggable : true
                    });
                    $(obj).parent().find('#event_lat').val(place.geometry.location.lat());
                    $(obj).parent().find('#event_lng').val(place.geometry.location.lng());
                    $(obj).parent().next().find('#event_address').val($(obj).val());
                    return false;
                }
            });
        }
        else
        {
            var id = $(obj).closest('form').find('#location_map .event-maps').attr('id');
            map = new google.maps.Map(document.getElementById(id), {
                zoom : 8,
                center : {lat : place.geometry.location.lat(), lng : place.geometry.location.lng()},
                type : 'ROADMAP'
            });

            var marker = new google.maps.Marker({
                position : {lat : place.geometry.location.lat(), lng : place.geometry.location.lng()},
                map : map,
                draggable : true
            });
            $(obj).parent().find('#event_lat').val(place.geometry.location.lat());
            $(obj).parent().find('#event_lng').val(place.geometry.location.lng());
            $(obj).parent().next().find('#event_address').val($(obj).val());
            return false;
        }
    });
}


function addNewLocationRow(obj, eventId){
    var newId = parseInt($('#locations .time-location-rows').children().first('.row').attr('id')) + 1;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/add-new-location-row",
        type : "POST",
        data : {event_id : eventId, element_id : newId},
        dataType : "JSON",
        success: function(response)
        {
            $('#locations .time-location-rows').prepend(response.data);
            $('#locations .time-location-rows #'+newId).find('#location_map .event-maps').attr('id', 'map-canvas-'+newId);

        }
    });
}

/*****************************************************************************
 ***************************Change Photo Script Start**************************
 ******************************************************************************/
function eventImageUpdate(fieldObj, type)
{
    let file_name = fieldObj.value;
    let split_extension = file_name.split(".");
    let calculatedSize = fieldObj.files[0].size / (1024 * 1024);
    let ext = ["png","jpg","gif"];
    if ($.inArray(split_extension[1].toLowerCase(), ext) == -1) {
        $(this).val(fieldObj.value = null);
        showToaster('error','You Can Upload Only .jpg, png, jpeg, gif Images !');
        return false;
    }
    if (calculatedSize > 1) {
        $(this).val(fieldObj.value = null);
        showToaster('error','File size should be less then 1 MB !');
        return false;
    }
    if ($.inArray(split_extension[1].toLowerCase(), ext) != -1 && calculatedSize < 1) {
        var file = fieldObj.files[0];
        img = new Image();
        img.src = URL.createObjectURL(file);
        img.onload = function() {
            if(type == 'header' && this.width <= 1600 && this.height <= 700){
                showToaster('error', 'Image Width must be 1600px & Height must be 700px');
                $(this).val(fieldObj.value = null);
                return false;
            }else if(type == 'gallery' && this.width <= 600 && this.height <= 600){
                showToaster('error', 'Image Width must be 600px & Height must be 600px atleast');
                $(this).val(fieldObj.value = null);
                return false;
            }

            if(type == 'gallery'){
                var eventId = $('#event_id').val();
                var image = $(fieldObj)[0].files[0];
                var form = new FormData();
                form.append('event_id', eventId);
                form.append('gallery_image', image);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url  : base_url() + "/events/upload-image",
                    type : "POST",
                    data : form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType : "JSON",
                    success: function(response)
                    {
                        if(response){
                            $(fieldObj).closest('.tooltipContainer').find('.customToolTip').addClass('hidden');
                            $(fieldObj).closest('.tooltipContainer').find('.remove-button').addClass('show-block').removeClass('hidden').attr('onclick', 'removeEventImage(this, "'+ response.data+'")');
                            $(fieldObj).closest('.tooltipContainer').find('.header-img').addClass('disable-events');
                        }
                    }
                });
            }


            var targetId = $(fieldObj).next('img').removeClass('hidden').addClass('show-block').attr('id');
            var target = document.getElementById(targetId);
            var fr = new FileReader();
            fr.onload = function(e) {
                target.src = this.result;
            };
            fr.readAsDataURL(fieldObj.files[0]);
            $(fieldObj).parent('.header-img').find('.label-content').removeClass('show-block').addClass('hidden');
        }
    }
}
/*****************************************************************************
 *************************Change Photo Script End *****************************
 ******************************************************************************/

/*****************************************************************************
 *************************Remove Photo From Event Edit Page*****************************
 ******************************************************************************/
function removeEventImage(obj, id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/remove-image",
        type : "POST",
        data : {id : id},
        dataType : "JSON",
        success: function(response)
        {
            if(response){
                $(obj).parent().parent().remove();
            }
        }
    });
}
/*****************************************************************************
 *************************End Remove Photo From Event Edit Page*****************************
 ******************************************************************************/

/*****************************************************************************
 *************************Add New Block For Photo Upload*****************************
 ******************************************************************************/
function addNewImage(eventId){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/add-new-image",
        type : "POST",
        data : {event_id : eventId},
        dataType : "JSON",
        success: function(response)
        {
            $('.upload-imges-row').append(response.data);
        }
    });
}
/*****************************************************************************
 *************************End Add New Block For Photo Upload*****************************
 ******************************************************************************/

/*****************************************************************************
 *************************Event Go Live*****************************
 ******************************************************************************/

function eventGolive(event, obj){
    event.preventDefault();
    var formData = new FormData($(obj)[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/go-live",
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
        },
        error:function(response)
        {
            var respObj = response.responseJSON;
            showToaster('error', respObj.message);
        }
    });
}

/*****************************************************************************
 *************************End Event Go Live*****************************
 ******************************************************************************/

function createHotDeal(obj){
    var locationId = $(obj).attr('id');
    $('#make-hot-deal').modal('show');
    $('#make-hot-deal #location-id').attr('value', locationId);
}

$("#make-hot").submit(function(event) {
    window.onbeforeunload = null;
    event.preventDefault();
    var form_data = new FormData($('#make-hot')[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/make-hot-deal",
        type : "POST",
        data : form_data,
        dataType : "JSON",
        cache: false,
        contentType: false,
        processData: false,
        success: function(resp){
            if(resp.type == "error"){
                var errObj = resp.msg;
                if(errObj != "")
                {
                    showToaster('error', errObj);
                    $('.save-hot').attr('disabled',false).text('Save Hot Deal');
                    return false;
                }
            }
            else if(resp.type == "success"){
                $('#make-hot')[0].reset();
                $('#make-hot-deal').modal('hide');
                showToaster('success',resp.msg);
                setTimeout(function(){
                    location.reload();
                },1000);
            }
        },
        error:function(error)
        {
            $('.save-hot').attr('disabled',false).text('Save Hot Deal');
        }
    });
});
/*****************************************************************************
 *************************End Create Event Hot Deal*****************************
 ******************************************************************************/

/*****************************************************************************
 *************************Delete Event Hot Deal*****************************
 ******************************************************************************/

function deleteHotDeal(obj){
    var event_id = $(obj).attr('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/events/remove-deal",
        type : "POST",
        data : {event_id : event_id},
        dataType : "JSON",
        success :function(response){
            if(response.type == 'success'){
                showToaster('success',response.msg);
                setTimeout(function(){
                    location.reload();
                },1000);
            }else{
                showToaster('error', response.msg);
                return false;
            }
        }
    });
}

/*****************************************************************************
 *************************End Delete Event Hot Deal*****************************
 ******************************************************************************/


function locationError(){
    sweetAlert('Error', 'Please create an Event Location first');
}


function updateUrl(type){
    if(type === 'organizer'){
        var url             = $('#organizer_url').val();
        var organizer_id    = $('#organizer-id').val();
        var domain          = $('#organizer-id').val();
        var event_id        = null;
        var requestUrl      = base_url()+'/change-orgranizer-url';
    }else{
        var url             = $('#event-old-url2').val();
        var event_id        = $('#location-id').val();
        var domain          = $('#event-domain-field').val();
        var organizer_id    = null;
        var requestUrl      = base_url()+'/events/update-event-url';
    }

    console.log('url', url);
    console.log('id', event_id);
    console.log('organizer_id', organizer_id);
    console.log('domain', domain);
    console.log('requestUrl', requestUrl);


    if((domain.indexOf(' ')>=0) || (domain.match(/[^a-zA-Z0-9 ]/g)) || domain == ""){
        sweetAlert('error', 'Your "Personalized URL" can only include alphanumeric letters.');
    }
    else{
        // Send ajax request to update organizer url
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: requestUrl,
            type: 'post',
            data: {
                'type'          : type,
                'domain'        : domain,
                'url'           : url,
                'organizer_id'  : organizer_id,
                'event_id'      : event_id,
            },
            success:function(response) {
                if(response.type == 'success'){
                    var base_path = $('input[name=base_url]').val();
                    sweetAlert('Success', response.msg);
                }else{
                    sweetAlert('Error', 'Something went wrong, Please try again!');
                }
            }
        });
    }
}


$('.ticket-listing .ticket-main-wrapper, .ticket-listing .new-tickets').hover(function(){
    $('.ticket-popup #icons-info').css('visibility', 'visible');
    $('.ticket-popup #disabled-buttons').css('visibility', 'hidden');
});

$('.ticket-listing .ticket-main-wrapper, .ticket-listing .new-tickets').mouseleave(function(){
    $('.ticket-popup #icons-info').css('visibility', 'hidden');
});


