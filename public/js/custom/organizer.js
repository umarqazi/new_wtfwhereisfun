/**
* Custom jQuery Organizer functions
* Author: Sorav Garg
* Author Email: soravgarg123@gmail.com
* version: 1.0
*/

$(document).ready(function($) {

    /*****************************************************************************
     ***************************Manage Organizer Script Start**********************
     ******************************************************************************/

    $("#organizer-form").submit(function (event) {
        event.preventDefault();
        var form_data = new FormData($('#organizer-form')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url() + "/organizers",
            type: "POST",
            data: form_data,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.organizer-btn').attr('disabled', true).text('Loading....');
                $('#organizer-form .form-error').html('');
            },
            success: function (resp) {
                if (resp.type == "success") {
                    $('#organizer-form')[0].reset();
                    $('#organizer-form .form-error').html('');
                    showToaster('success', resp.msg);
                } else {
                    showToaster('error', resp.msg);
                }
                $('.organizer-btn').attr('disabled', false).text('Save');
            },
            error: function (response) {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys = Object.keys(errors);
                var count = keys.length;
                for (var i = 0; i < count; i++) {
                    $('.' + keys[i]).html(errors[keys[i]]).focus();
                }
                $('.organizer-btn').attr('disabled', false).text('Save');
            }
        });
    });

    /*****************************************************************************
     *************************Manage Organizer Script End *************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Manage Organizer Script Start**********************
     ******************************************************************************/

    $("#organizer-profile").submit(function (event) {
        event.preventDefault();
        var form_data = new FormData($('#organizer-profile')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url() + "/organizers/update-profile",
            type: "POST",
            data: form_data,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#organizer-profile .organizer-btn').attr('disabled', true).text('Loading....');
            },
            success: function (resp) {
                if (resp.type == "success") {
                    showToaster('success', resp.msg);
                } else {
                    showToaster('error', resp.msg);
                }
                $('#organizer-profile .organizer-btn').attr('disabled', false).text('Save');
            },
            error: function (response) {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys = Object.keys(errors);
                var count = keys.length;
                for (var i = 0; i < count; i++) {
                    $('.' + keys[i]).html(errors[keys[i]]).focus();
                }
                $('#organizer-profile .organizer-btn').attr('disabled', false).text('Save');
            }
        });
    });

    /*****************************************************************************
     *************************Manage Organizer Script End *************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Manage Organizer Script Start**********************
     ******************************************************************************/

    $("#organizer-social-links").submit(function (event) {
        event.preventDefault();
        var form_data = new FormData($('#organizer-social-links')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url() + "/organizers/update-social-links",
            type: "POST",
            data: form_data,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#organizer-social-links .organizer-btn').attr('disabled', true).text('Loading....');
            },
            success: function (resp) {
                if (resp.type == "success") {
                    showToaster('success', resp.msg);
                } else {
                    showToaster('error', resp.msg);
                }
                $('#organizer-social-links .organizer-btn').attr('disabled', false).text('Save');
            },
            error: function (response) {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys = Object.keys(errors);
                var count = keys.length;
                for (var i = 0; i < count; i++) {
                    $('.' + keys[i]).html(errors[keys[i]]).focus();
                }
                $('#organizer-social-links .organizer-btn').attr('disabled', false).text('Save');
            }
        });
    });

    /*****************************************************************************
     *************************Manage Organizer Script End *************************
     ******************************************************************************/

    /*****************************************************************************
     ***************************Manage Organizer Script Start**********************
     ******************************************************************************/

    $("#organizer-color-customization").submit(function (event) {
        event.preventDefault();
        var form_data = new FormData($('#organizer-color-customization')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url() + "/organizers/update-profile-colors",
            type: "POST",
            data: form_data,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#organizer-color-customization .organizer-btn').attr('disabled', true).text('Loading....');
            },
            success: function (resp) {
                if (resp.type == "success") {
                    showToaster('success', resp.msg);
                } else {
                    showToaster('error', resp.msg);
                }
                $('#organizer-color-customization .organizer-btn').attr('disabled', false).text('Save');
            },
            error: function (response) {
                var respObj = response.responseJSON;
                showToaster('error', respObj.message);
                errors = respObj.errors;
                var keys = Object.keys(errors);
                var count = keys.length;
                for (var i = 0; i < count; i++) {
                    $('.' + keys[i]).html(errors[keys[i]]).focus();
                }
                $('#organizer-color-customization .organizer-btn').attr('disabled', false).text('Save');
            }
        });
    });

    /*****************************************************************************
     *************************Manage Organizer Script End *************************
     ******************************************************************************/

    /*****************************************************************************
     *************************Organizer Photo Script Start ************************
     ******************************************************************************/

    $('body').on('change', '.upload-profile-btn', function () {
        readURL(this);
    });

    $('body').on('click', '.remove-photo-btn', function () {
        $('.upload-profile-img').html('<i class="fa fa-user-o" aria-hidden="true"></i>');
        $('.remove-photo-btn').addClass('hidden');
    });
});

    /*****************************************************************************
     *************************Organizer Photo Script End **************************
     ******************************************************************************/

    function readURL(input) {
        var ext = "jpg|png|gif|jpeg";
        var file_name = input.value;
        var split_extension = file_name.split(".").pop();
        var extArr = ext.split("|");
        var calculatedSize = input.files[0].size / (1024 * 1024);
        if ($.inArray(split_extension.toLowerCase(), extArr) == -1) {
            $(input).val("");
            showToaster('error', 'You Can Upload Only .' + extArr.join(", ") + ' files !');
            return false;
        }
        if (calculatedSize > 1) {
            $(input).val("");
            showToaster('error', 'File size should be less then 1 MB !');
            return false;
        }
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-profile-img').html('<img src="' + e.target.result + '" style="width:100%" alt="organizer-img">');
                $('.remove-photo-btn').removeClass('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function manageColors(type, colorVal) {
        if (type === 'BG') {
            $('.color-preview').css('background-color', colorVal);
        } else {
            $('.color-preview').css('color', colorVal);
        }
    }


