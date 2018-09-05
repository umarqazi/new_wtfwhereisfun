/**
 * Custom jQuery User Account functions
 * Author: Sorav Garg
 * Author Email: soravgarg123@gmail.com
 * version: 1.0
 */
$(document).ready(function($) {

    var billingShipping = $('.show_billing').val();
    if(billingShipping == 1){
        $('.billing-address-wrap').hide().find('input').val('');
    }
    /*****************************************************************************
     ***************************Change Password Script Start***********************
     ******************************************************************************/

    $("#password-change").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#password-change')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/update-password",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#password-change .form-error').html('');
                $('#password-change .password-btn').attr('disabled',true).text('Loading....');
            },
            success: function(response){
                if(response.type == "success"){
                    $('#password-change')[0].reset();
                    showToaster('success',response.msg);
                }
                else{
                    showToaster('error',response.msg);
                }
                $('#password-change .password-btn').attr('disabled',false).text('Save');
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
                    $('#password-change .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#password-change .password-btn').attr('disabled',false).text('Save');
            }
        });
    });


    /*****************************************************************************
     *************************Change Password Script End **************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Account Close Script Start*************************
     ******************************************************************************/

    $("#close-account-form").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#close-account-form')[0]);
        $.ajax({
            url  : base_url() + "account/close",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('.close-account-btn').attr('disabled',true).text('Loading....');
            },
            success: function(resp){
                if(resp.type == "validation_err"){
                    var errObj = resp.msg;
                    var keys   = Object.keys(errObj);
                    var count  = keys.length;
                    for (var i = 0; i < count; i++)
                    {
                        if(errObj[keys[i]] != "")
                        {
                            showToaster('error',errObj[keys[i]]);
                            $('.close-account-btn').attr('disabled',false).text('Account Close');
                            return false;
                        }
                    }
                }
                else if(resp.type == "success"){
                    $('#close-account-form')[0].reset();
                    showToaster('success',resp.msg);
                    setTimeout(function(){
                        window.location.href = base_url();
                    },1000);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('.close-account-btn').attr('disabled',false).text('Account Close');
            },
            error:function(error)
            {
                $('.close-account-btn').attr('disabled',false).text('Account Close');
            }
        });
    });


    /*****************************************************************************
     *************************Account Close Script End ****************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Email Preferences Script Start*********************
     ******************************************************************************/

    $("#email-preferences-form").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#email-preferences-form')[0]);
        $.ajax({
            url  : base_url() + "account/update_email_preferences",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('.email-preferences-btn').attr('disabled',true).text('Loading....');
            },
            success: function(resp){
                if(resp.type == "validation_err"){
                    var errObj = resp.msg;
                    var keys   = Object.keys(errObj);
                    var count  = keys.length;
                    for (var i = 0; i < count; i++)
                    {
                        if(errObj[keys[i]] != "")
                        {
                            showToaster('error',errObj[keys[i]]);
                            $('.email-preferences-btn').attr('disabled',false).text('Save');
                            return false;
                        }
                    }
                }
                else if(resp.type == "success"){
                    showToaster('success',resp.msg);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('.email-preferences-btn').attr('disabled',false).text('Save');
            },
            error:function(error)
            {
                $('.email-preferences-btn').attr('disabled',false).text('Save');
            }
        });
    });


    /*****************************************************************************
     *************************Email Preferences Script End ************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Change Email Script Start**************************
     ******************************************************************************/

    $("#change-email-form").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#change-email-form')[0]);
        $.ajax({
            url  : base_url() + "account/change_email",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('.change-email-btn').attr('disabled',true).text('Loading....');
            },
            success: function(resp){
                if(resp.type == "validation_err"){
                    var errObj = resp.msg;
                    var keys   = Object.keys(errObj);
                    var count  = keys.length;
                    for (var i = 0; i < count; i++)
                    {
                        if(errObj[keys[i]] != "")
                        {
                            showToaster('error',errObj[keys[i]]);
                            $('.change-email-btn').attr('disabled',false).text('Save');
                            return false;
                        }
                    }
                }
                else if(resp.type == "success"){
                    $('#change-email-form')[0].reset();
                    showToaster('success',resp.msg);
                    setTimeout(function(){
                        window.location.reload();
                    },1000);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('.change-email-btn').attr('disabled',false).text('Save');
            },
            error:function(error)
            {
                $('.change-email-btn').attr('disabled',false).text('Save');
            }
        });
    });


    /*****************************************************************************
     *************************Change Email Script End *****************************
     ******************************************************************************/

    /*****************************************************************************
     *************************Change Country Script Start *************************
     ******************************************************************************/

    $('body').on('change','.change-country',function(){
        let defaultCountry = $('#default-country').val();
        let addressType    = $(this).attr('main');
        let countryVal     = $(this).val();
        if(countryVal != defaultCountry){
            $('.' + addressType + '-state').addClass('hidden');
        }else{
            $('.' + addressType + '-state').removeClass('hidden');
        }
    });

    /*****************************************************************************
     *************************Change Country Script End ***************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Update Profile Script Start************************
     ******************************************************************************/

    $("#profile-information").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#profile-information')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/update-profile",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#profile-information .profile-btn').attr('disabled',true).text('Loading....');
                $('#profile-information .form-error').html('');
            },
            success: function(resp){
                if(resp.type == "success"){
                    showToaster('success',resp.msg);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('#profile-information .profile-btn').attr('disabled',false).text('Save');
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
                    $('#profile-information .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#profile-information .profile-btn').attr('disabled',false).text('Save');
            }
        });
    });


    /*****************************************************************************
     *************************Update Profile Script End ***************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Update Profile Script Start************************
     ******************************************************************************/

    $("#contact-information").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#contact-information')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/update-contact",
            type : "post",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#contact-information .profile-btn').attr('disabled',true).text('Loading....');
                $('#contact-information .form-error').html('');
            },
            success: function(resp){
                if(resp.type == "success"){
                    showToaster('success',resp.msg);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('.profile-btn').attr('disabled',false).text('Save');
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
                    $('#contact-information .'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#contact-information .profile-btn').attr('disabled',false).text('Save');
            }
        });
    });


    /*****************************************************************************
     *************************Update Profile Script End ***************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Update Profile Script Start************************
     ******************************************************************************/

    $("#other-information").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#other-information')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/update-other-info",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#other-information .profile-btn').attr('disabled',true).text('Loading....');
                $('#other-information .form-error').html('');
            },
            success: function(resp){
                console.log(resp);
                if(resp.type == "success"){
                    showToaster('success',resp.msg);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('#other-information .profile-btn').attr('disabled',false).text('Save');
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
                    $('.'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#other-information .profile-btn').attr('disabled',false).text('Save');
            }
        });
    });


    /*****************************************************************************
     *************************Update Profile Script End ***************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Update Profile Script Start************************
     ******************************************************************************/

    $("#address-information").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#address-information')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/update-address",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#address-information .profile-btn').attr('disabled',true).text('Loading....');
                $('#address-information .form-error').html('');
            },
            success: function(resp){
                if(resp.type == "success"){
                    showToaster('success',resp.msg);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('#address-information .profile-btn').attr('disabled',false).text('Save');
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
                    $('.'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#address-information .profile-btn').attr('disabled',false).text('Save');
            }
        });
    });


    /*****************************************************************************
     *************************Update Profile Script End ***************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Update Profile Script Start************************
     ******************************************************************************/

    $("#email-preferences").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($('#email-preferences')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/update-email-preference",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('#email-preferences .profile-btn').attr('disabled',true).text('Loading....');
                $('#email-preferences .form-error').html('');
            },
            success: function(resp){
                if(resp.type == "success"){
                    showToaster('success',resp.msg);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('#email-preferences .profile-btn').attr('disabled',false).text('Save');
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
                    $('.'+keys[i]).html(errors[keys[i]]).focus();
                }
                $('#email-preferences .profile-btn').attr('disabled',false).text('Save');
            }
        });
    });


    /*****************************************************************************
     *************************Update Profile Script End ***************************
     ******************************************************************************/

    /*****************************************************************************
     *************************Social Connect Script Start *************************
     ******************************************************************************/

    $('body').on('click','.social-fb-btn',function(){
        showToaster('success','Social connect section is under working !!');
    });

    /*****************************************************************************
     *************************Social Connect Script End ***************************
     ******************************************************************************/

});

/*****************************************************************************
 ***************************Change Photo Script Start**************************
 ******************************************************************************/

function uploadFile(fieldObj)
{
    let file_name = fieldObj.value;
    let split_extension = file_name.split(".");
    let calculatedSize = fieldObj.files[0].size / (1024 * 1024);
    let ext = ["png","jpg","jpeg","gif"];
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
        var form_data = new FormData($('#change-photo-form')[0]);
        $.ajax({
            url  : base_url() + "account/upload_photo",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function(resp){
                if(resp.type == "success"){
                    showToaster('success',resp.msg);
                    setTimeout(function(){
                        window.location.reload();
                    },1000);
                }else{
                    showToaster('error',resp.msg);
                }
            },
            error:function(error)
            {
                console.log('photo error',error);
            }
        });
    }
}

function showImage(src,target) {
    var fr=new FileReader();
    fr.onload = function(e) { target.src = this.result; };
    src.addEventListener("change",function() {
        fr.readAsDataURL(src.files[0]);
    });
}

var image4 = document.getElementById("image4");
var target4 = document.getElementById("target4");
showImage(image4,target4);


/*****************************************************************************
 *************************Change Photo Script End *****************************
 ******************************************************************************/


/*****************************************************************************
 ***************************Get Country States***********************
 ******************************************************************************/
function getStates(obj){
    element = $(obj);
    var country_id = obj.value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/get-country-states",
        type : "POST",
        data : { country : country_id},
        dataType : "JSON",
        beforeSend:function(){
            element.parent().next().find('select.states').find('option').not(':first').remove();
            element.parent().next().next().find('select.cities').attr('disabled', true).attr('value', '');
        },
        success: function(resp){
            element.parent().next().find('select.states').append(resp).removeAttr('disabled');
        }
    });
}
/*****************************************************************************
 ***************************End Get Country States***********************
 ******************************************************************************/

/*****************************************************************************
 ***************************Get State Cities***********************
 ******************************************************************************/
function getCities(obj){
    element = $(obj);
    var state_id = obj.value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/get-state-cities",
        type : "POST",
        data : { state : state_id},
        dataType : "JSON",
        beforeSend:function(){
            element.parent().next().find('select.cities').find('option').not(':first').remove();
        },
        success: function(resp){
            element.parent().next().find('select.cities').append(resp).removeAttr('disabled');
        }
    });
}
/*****************************************************************************
 ***************************End Get State Cities***********************
 ******************************************************************************/

/*****************************************************************************
 ***************************Get State Cities***********************
 ******************************************************************************/
function isShippingBilling(obj){
    element = $(obj);
    if(element.is(":checked")){
        $('.billing-address-wrap').hide().find('input').val('');
    }else{
        $('.billing-address-wrap').show();
    }

}
/*****************************************************************************
 ***************************End Get State Cities***********************
 ******************************************************************************/


