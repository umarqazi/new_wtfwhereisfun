/**
 * Custom jQuery Singup/Login functions
 * Author: Sorav Garg
 * Author Email: soravgarg123@gmail.com
 * version: 1.0
 */

$(document).ready(function($) {
    /*****************************************************************************
     ***************************Show Hide Forms*******************************
     ******************************************************************************/

    $(".login-main-btn").click(function(){
        $('#signup').modal('hide');
    });

    $('.signup-main-btn').click(function(){
        $('#login').modal('hide');
    });

    $('.modal').on('hidden.bs.modal', function (e) {
        if($('.modal').hasClass('in')) {
            $('body').addClass('modal-open');
        }
    });

    $('.show-personal').click(function(e){
        e.preventDefault();
        $('.-tab').removeClass('active');
        $('.personal-tab').addClass('active');
        $('.tab-content #organization').hide();
        $('.tab-content #personal').show();
    });

    $('.show-org').click(function(e){
        e.preventDefault();
        $(this).parent().addClass('active');
        $('.tab-content #personal').hide();
        $('.tab-content #organization').show();
    });

    /*****************************************************************************
     ***************************Singup Script Start *******************************
     ******************************************************************************/

    $(".signup-form").submit(function(event) {
        event.preventDefault();
        var form_data = new FormData($(this)[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url() + "/do-register",
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('.signup-btn').attr('disabled',true).text('Loading....');
            },
            success: function(resp){
                if(resp.type == "success"){
                    $('#signup-form')[0].reset();
                    $('#signup').modal('hide');
                    showToaster('success',resp.msg);
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('.signup-btn').attr('disabled',false).text('Sign up');
            },
            error: function (data) {
                var errors = data.responseJSON;
                keys = Object.keys(errors);
                if($.inArray('errors', keys)){
                    $.each( errors.errors , function( key, value ) {
                        showToaster('error', value);
                        $('.signup-btn').attr('disabled',false).text('Sign up');
                        return false;
                    });
                }
            }
        });
    });


    /*****************************************************************************
     *************************Singup Script End ***********************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Login Script Start *******************************
     ******************************************************************************/

    $("#login-form").submit(function(event) {
        window.onbeforeunload = null;
        event.preventDefault();
        var form_data = new FormData($('#login-form')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url  : base_url()+'/do-login',
            type : "POST",
            data : form_data,
            dataType : "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $('.login-btn').attr('disabled',true).text('Loading....');
            },
            success: function(resp){
                if(resp.type == "success"){
                    $('#login-form')[0].reset();
                    if(resp.data.role == 'vendor'){
                        window.location.href = base_url() + '/dashboard';
                    }else{
                        window.location.href = base_url();
                    }
                }
                else{
                    showToaster('error',resp.msg);
                }
                $('.login-btn').attr('disabled',false).text('Sign in');
            },
            error:function(error)
            {
                $('.login-btn').attr('disabled',false).text('Sign in');
            }
        });
    });


    /*****************************************************************************
     *************************Login Script End ***********************************
     ******************************************************************************/
});

/*****************************************************************************
 ***************************Resend Verification Email Start *******************************
 ******************************************************************************/

function resendVerification(event) {
    window.onbeforeunload = null;
    event.preventDefault();
    var form_data = new FormData($('#login-form')[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url()+'/do-resend-verification',
        type : "POST",
        data : form_data,
        dataType : "JSON",
        cache: false,
        contentType: false,
        processData: false,
        success: function(resp){
            if(resp.type == "success"){
                $('#login').modal('hide');
                $('#login-form')[0].reset();
                showToaster('Success', resp.msg);
            }
            else{
                showToaster('error',resp.msg);
            }
        },
        error:function(error)
        {
        }
    });
}


/*****************************************************************************
 *************************Resend Verification Email End ***********************************
 ******************************************************************************/

/*****************************************************************************
 ***************************Facebook Login Script Start ***********************
 ******************************************************************************/

window.fbAsyncInit = function() {
    FB.init({
        appId      : '186770818730407', // Set YOUR APP ID
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
    });
};

function fbLogin()
{
    FB.login(function(response) {
        if (response.authResponse) {
            getFBUserInfo();
        }else {
            showToaster('error','User cancelled login or did not fully authorize.');
            return false;
        }
    },{scope: 'email,user_photos,user_videos'});
}

function getFBUserInfo() {
    FB.api('/me',{fields: "id,picture,email,first_name,gender,middle_name,name"}, function(response) {
        $.ajax({
            url  : base_url() + "welcome/facebook_login",
            type : "POST",
            data : {response:response},
            dataType : "JSON",
            beforeSend:function(){
                ajaxindicatorstart();
            },
            success: function(resp){
                ajaxindicatorstop();
                if(resp.type == "success"){
                    fbLogout();
                    if(resp.isNewUser == 1){
                        let userID = resp.userID;
                        $('#user-type-modal').modal('show');
                        $('#userID').val(userID);
                    }else{
                        showToaster('success',resp.msg);
                        setTimeout(function(){
                            window.location.href = base_url() + 'account-setting';
                        },1000);
                    }
                }
                else{
                    showToaster('error',resp.msg);
                }
            },
            error:function(error)
            {
                ajaxindicatorstop();
            }
        });
    });
}

function fbLogout()
{
    FB.logout(function(){ console.log('facebook logout') });
}

// Load the SDK asynchronously
(function(d){
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));

/*****************************************************************************
 *************************Facebook Login Script End ***************************
 ******************************************************************************/

