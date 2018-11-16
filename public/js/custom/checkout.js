$(".quantity-button").on("click", function () {

    var $button = $(this).find('i');
    var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();

    var get_button = $button.hasClass('fa-plus');

    if (get_button) {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }

    var price = $('#ticket-price').val();
    var total = price * newVal;
    $button.closest('.sp-quantity').find("input.quntity-input").attr('value', newVal);
    $('#total-price').text('$'+total);

});

function getUserForm(obj){
    var userStatus = $("input[name='user_status']:checked").val();

    if(userStatus == 'old'){
        var fields = "<div class=\"form-group\">\n" +
                        "<label for=\"email\">Email address:</label>\n" +
                        "<input type=\"email\" class=\"form-control\" id=\"login-email\" name=\"email\"\n" +
                        "placeholder=\"Email Address\" required>\n" +
                        "</div>\n" +
                        "<div class=\"form-error email\"></div>";
        $('.user-detail-form').html(fields);
    }else{
        var fields = "<div class=\"form-group\">\n" +
            "                            <label for=\"email\">Email address:</label>\n" +
            "                            <input type=\"email\" class=\"form-control\" id=\"login-email\" name=\"email\"\n" +
            "                                   placeholder=\"Email Address\" required>\n" +
            "                            <div class=\"form-error email\"></div>\n" +
            "                        </div>\n" +
            "\n" +
            "                        <div class=\"form-group\">\n" +
            "                            <label for=\"pwd\">Password:</label>\n" +
            "                            <input type=\"password\" class=\"form-control prevent-copy-paste\"\n" +
            "                                   name=\"password\" id=\"login-pwd\" placeholder=\"Password\" required=\"\">\n" +
            "                            <div class=\"form-error password\"></div>\n" +
            "                        </div>";
        $('.user-detail-form').html(fields);
    }
}


function completeCheckout(event, obj){
    event.preventDefault();
    var form_data = new FormData($('#checkout-form')[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: base_url() + "/validate-checkout",
        type: "POST",
        data: form_data,
        dataType: "JSON",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('.submit').attr('disabled', true).text('Loading....');
            $('#checkout-form .form-error').html('');
        },
        success: function (resp) {
            if (resp.type == "success") {
                var url = window.location.href = base_url()+'/checkout/proceed';
                $('#checkout-form').removeAttr('onsubmit').attr('action', url).submit();
            } else {
                showToaster('error', resp.msg);
            }
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
            $('.submit').attr('disabled', false).text('Checkout');
        }
    });
}