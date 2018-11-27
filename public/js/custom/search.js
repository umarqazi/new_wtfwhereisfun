function searchEvents(event){
    event.preventDefault();
    var form_data = new FormData($('#search-events-form')[0]);
    form_data.append('type', 'json');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url  : base_url() + "/search-events",
        type : "POST",
        data : form_data,
        dataType : "JSON",
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){
            if(response.type == "success"){
                console.log(response.data.searchResults);
                $('.search_dropdown').empty().css('display', 'block').append(response.data.searchResults)
            }
            else{
                showToaster('error',response.msg);
            }
        }
    });
}

function checkLocation(obj){
    if($(obj).val().length < 1){
        $('#search-button').attr('disabled', 'disabled').css('opacity', '0.7');
    }else{
        $('#search-button').removeAttr('disabled').css('opacity', '1');
    }
}

function hideSearchResults(){
    setTimeout(function(){
        $('.search_dropdown').css('display', 'none');
        }, 500);
}