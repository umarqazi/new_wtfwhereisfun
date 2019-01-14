/*****************************************************************************
 *************************Start Contact Us Email*****************************
 ******************************************************************************/
$("#contact-form").submit(function(event) {
    event.preventDefault();
    var form_data = new FormData($('#contact-form')[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/contact-us/email",
        type : "POST",
        data : form_data,
        dataType : "JSON",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend:function(){
            $('#contact-form').find('.form-error').html('');
        },
        success: function(response){
            if(response.type === "success"){
                $('#contact-form')[0].reset();
                showToaster('success',resp.msg);
                setTimeout(function(){
                    location.reload();
                },1000);
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
                $("#contact-form").find('.'+keys[i]).html(errors[keys[i]]).focus();
            }
        }
    });
});
/*****************************************************************************
 *************************End Contact Us Email*****************************
 ******************************************************************************/
