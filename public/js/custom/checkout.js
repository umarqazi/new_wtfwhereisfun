$(".quantity-button").on("click", function () {
    var $button = $(this).find('i');
    var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();

    var get_button = $button.hasClass('fa-plus');
    if (get_button) {
        if(oldValue < qtyleft){
            var newVal = parseFloat(oldValue) + 1;
        }else{
            showToaster('error', 'We have only '+qtyleft+' tickets left');
            return;
        }
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }

    var price = $('#ticket-price').val();
    var discount = 0;
    if($('tr').hasClass('hot-deal')){
        discount = $('#discount').val() * price / 100;
        discount = discount * newVal;
    }

    var total = price * newVal - discount;
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
    $('.submit').attr('disabled', true).text('Loading....');
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
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
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

// Create a Stripe client.
var stripe = Stripe('pk_test_kllUqSb2Dk8DG1r20FTr2nEg');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        lineHeight: '18px',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('checkout-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    // Submit the form
    form.submit();
}