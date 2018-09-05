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