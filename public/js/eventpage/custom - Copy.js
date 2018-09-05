$(document).ready(function() {
   
       $('.addAnother_event_location1').addClass('hidden');
        $('.addAnother_event_location2').addClass('hidden');
         $('.addAnother_event_location3').addClass('hidden');
              
      function readURL() {
            var $input = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    reset($input.next('.delbtn'), true);
                    $input.next('.portimg').attr('src', e.target.result).show();
                    $input.after('<input type="button" class="delbtn removebtn" value="remove">');
                }
                reader.readAsDataURL(this.files[0]);
            }
        }
        $(".fileUpload").change(readURL);
        $("form").on('click', '.delbtn', function (e) {
            reset($(this));
        });

        function reset(elm, prserveFileName) {
            if (elm && elm.length > 0) {
                var $input = elm;
                $input.next('.portimg').attr('src', '').hide();
                if (!prserveFileName) {
                    $input.prev('.fileUpload').val("");
                }
                elm.remove();
            }
        }


        $('.contact_toogle').click(function(){
          $(this).css('display','none');
          $('.contact_append').css('display','block');
        });
        $('.refferal_toogle').click(function(){
          $(this).css('display','none');
          $('.referral_append').css('display','block');
        });
        //
        $('.public_unlisted a').click(function(e){
        e.preventDefault();
       $(this).addClass('active');
        $(this).siblings().each(function(){
            $(this).removeClass('active') ;
        });
    });

         $('.unlisted_toogle').click(function(){
          $(".social-buttons-toggle").css('display','block');
            $('#event_show').val('unlisted');
         });
         $('.public_toggle').click(function(){
          $(".social-buttons-toggle").css('display','none');
            $('#event_show').val('public');
         });
         
         //
          //$('.content_editor1').richText();
         // $('.content_editor2').richText();
          //
          var Pass = '<ul class="listTable_row table_row clearfix hide-on">';
        Pass = Pass+'<li>';
        Pass = Pass+'<input type="text" class="form-control" placeholder="e.g General Admission" name="ticket_name[]" required=""></li>';
        Pass = Pass+'<li><input type="number" class="form-control qty-a" placeholder="Unlimited" name="quantity[]" required=""></li>';
        Pass = Pass+'<li><input type="number" class="form-control " placeholder="Cost" name="ticket_price[]" required=""></li>';
        Pass = Pass+'<li><ol class="action_list"><li><a href="javascript:void()" class="ticket-connect-pass"><i class="fa fa-ticket"></i></a></li><li class=""><input type="hidden" name="aa" class="aaaa" value="0" ><a href="javascript:void(0)" class="setting-clicks"><i class="fa fa-cog"></i></a></li><li><a href="javascript:void()" class="copy-click"><i class="fa fa-folder-open"></i></a></li><li><a href="javascript:void()" class="ticket_removerow"><i class="fa fa-trash"></i></a></li></ol></li></ul>';        
          $('body').on('click','.passes-link',function(){
              //$('.passes-link').addClass('hidden');
              $('.hide-free').addClass('hidden');
          $('.hide-donation').addClass('hidden');
          $('.hide-paid').addClass('hidden');
              $('.three-offer').addClass('hidden');
              $('.three-offers').removeClass('hidden'); 
              $('.ticket-link').removeClass('hidden');
              $('.new-passes').removeClass('hidden');
              $('.New_pass_appendedbox').removeClass('hidden');
              $('.new-passes').removeClass('hidden');
           $('.passmain_content').removeClass('hidden');
           $('.setting-paid-ticket').addClass('hidden');
           //
          });
          //
          $('body').on('click','.ticket-link',function(){
              //$('.ticket-link').addClass('hidden');
              $('.three-offers').removeClass('hidden');
              $('.three-offer').removeClass('hidden');
              $('.passes-link').removeClass('hidden');
              $('.new-passes').addClass('hidden');
              $('.setting-paid-ticket1').addClass('hidden');
              $('.New_pass_appendedbox').addClass('hidden');
          });

    $(document).on('click',".datepicker1", function(e){ 
        //bind to all instances of class "date". 
        $(this).datetimepicker();
    });

    $(document).on('click',".datepicker2", function(e){ 
    //bind to all instances of class "date". 
         $(this).datetimepicker();
    });
    //
    $('.addAnother_btn').click(function(){
        $('#datetime_area').clone().addClass('remove_datearea_div').appendTo($('#more_date'));
    });
        

    $('.addAnother_event_location').click(function(){
        $('#location_box_main1').removeClass('hidden').addClass('remove_event_div1');
        $('.addAnother_event_location').addClass('hidden');
        $('.addAnother_event_location1').removeClass('hidden');
        /*$('#event_location1').val('');
        $('#event_address1').val('');
        $('#currencynew option[value="USD"]').attr("selected", "selected");
        $('#transacted_currency2 option[value="$Usd"]').attr("selected", "selected");*/

    }); 

    $('.addAnother_event_location1').click(function(){
        $('#location_box_main2').removeClass('hidden').addClass('remove_event_div2');
        $('.addAnother_event_location1').addClass('hidden');
        $('#remove_eventrow1').addClass('hidden');
        $('.addAnother_event_location2').removeClass('hidden');
        /*$('#event_location2').val('');
        $('#event_address2').val('');
        $('#currencynew1 option[value="USD"]').attr("selected", "selected");
        $('#transacted_currency3 option[value="$Usd"]').attr("selected", "selected");*/
    });

    $('.addAnother_event_location2').click(function(){
        $('#location_box_main3').removeClass('hidden').addClass('remove_event_div3');
        $('.addAnother_event_location2').addClass('hidden');
        $('.addAnother_event_location3').removeClass('hidden');
        $('#remove_eventrow2').addClass('hidden');

    });

    $('.addAnother_event_location3').click(function(){
        $('#location_box_main4').removeClass('hidden').addClass('remove_event_div4');
        $('.addAnother_event_location3').addClass('hidden');
        //$('.addAnother_event_location4').removeClass('hidden');
        $('#remove_eventrow3').addClass('hidden');

    });

    $(document).on('click','.remove_daterow',function() {
      //$(this).parent().remove();
      $(this).closest(".remove_datearea_div").remove();
    });

    $(document).on('click','.remove_eventrow',function() {
      //$(this).parent().remove();
      $(this).closest(".remove_event_div").remove();

    });
    $(document).on('click','#remove_eventrow1',function() {
      //$(this).parent().remove();
      $('#location_box_main1').addClass('hidden').removeClass('remove_event_div1');
      $(this).closest(".remove_event_div1").remove();
      $('.addAnother_event_location').removeClass('hidden');
      $('.addAnother_event_location1').addClass('hidden');
    });
    $(document).on('click','#remove_eventrow2',function() {
      //$(this).parent().remove();
      $('#location_box_main2').addClass('hidden').removeClass('remove_event_div2');
      $(this).closest(".remove_event_div2").remove();
      $('.addAnother_event_location1').removeClass('hidden');
      $('.addAnother_event_location2').addClass('hidden'); 
      $('#remove_eventrow1').removeClass('hidden');
    });
    $(document).on('click','#remove_eventrow3',function() {
     $('#location_box_main3').addClass('hidden').removeClass('remove_event_div3');
      $(this).closest(".remove_event_div3").remove();
      $('.addAnother_event_location2').removeClass('hidden');
      $('.addAnother_event_location3').addClass('hidden'); 
      $('#remove_eventrow2').removeClass('hidden');
    });
    $(document).on('click','#remove_eventrow4',function() {
      //$(this).parent().remove();
    $('#location_box_main4').addClass('hidden').removeClass('remove_event_div4');

      $(this).closest(".remove_event_div4").remove();
      $('.addAnother_event_location3').removeClass('hidden');
      $('.addAnother_event_location4').addClass('hidden');
      $('#remove_eventrow3').removeClass('hidden');
    });
      
    var PaidTicket = '<ul class="listTable_row table_row clearfix hide-paid">';
        PaidTicket = PaidTicket+'<li>';
        PaidTicket = PaidTicket+'<input type="text" class="form-control" placeholder="e.g General Admission" name="ticket_name[]" required=""></li>';
        PaidTicket = PaidTicket+'<li><input type="number" class="form-control qty-a" placeholder="Unlimited" name="quantity[]" required=""></li>';
        PaidTicket = PaidTicket+'<li><input type="number" class="form-control " placeholder="Cost" name="ticket_price[]" required=""></li>';
        PaidTicket = PaidTicket+'<li><ol class="action_list"><li class=""><input type="hidden" name="aaa" class="aaa" value="0" ><a href="javascript:void(0)" class="setting-click"><i class="fa fa-cog"></i></a></li><li><a href="javascript:void()" class="copy-click"><i class="fa fa-folder-open"></i></a></li><li><a href="javascript:void()" class="ticket_removerow"><i class="fa fa-trash"></i></a></li></ol></li></ul>';
/* ======== Donation Ticket ====*/
    var DonationTicket = '<ul class="listTable_row table_row clearfix hide-donation">';
        DonationTicket = DonationTicket+'<li>';
        DonationTicket = DonationTicket+'<input type="text" class="form-control" placeholder="e.g General Admission" name="ticket_name[]" required=""></li>';
        DonationTicket = DonationTicket+'<li><input type="number" class="form-control qty-a" placeholder="Unlimited" name="quantity[]" required=""></li>';
        DonationTicket = DonationTicket+'<li><input type="number" class="form-control" placeholder="Cost" name="ticket_price[]" required=""></li>';
        DonationTicket = DonationTicket+'<li><ol class="action_list"></li><li class=""><input type="hidden" name="aaa" class="aaa" value="0" ><a href="javascript:void(0)" class="setting-click"><i class="fa fa-cog"></i></a></li><li><a href="javascript:void()" class="copy-click"><i class="fa fa-folder-open"></i></a></li><li><a href="javascript:void()" class="ticket_removerow"><i class="fa fa-trash"></i></a></li></ol></li></ul>';

/* ==== Free Tickets =====*/ 
    var FreeTicket = '<ul class="listTable_row table_row clearfix hide-free">';
        FreeTicket = FreeTicket+'<li>';
        FreeTicket = FreeTicket+'<input type="text" class="form-control" placeholder="e.g General Admission" name="ticket_name[]" required=""></li>';
        FreeTicket = FreeTicket+'<li><input type="number" class="form-control qty-a" placeholder="Unlimited" name="quantity[]" required=""></li>';
        FreeTicket = FreeTicket+'<li>Free<input type="hidden" class="form-control" placeholder="Cost" name="ticket_price[]" value="0"></li>';
        FreeTicket = FreeTicket+'<li><ol class="action_list"><li class=""><input type="hidden" name="aaa" class="aaa" value="0" ><a href="javascript:void(0)" class="setting-click"><i class="fa fa-cog"></i></a></li><li><a href="javascript:void()" class="copy-click"><i class="fa fa-folder-open"></i></a></li><li><a href="javascript:void()" class="ticket_removerow"><i class="fa fa-trash"></i></a></li></ol></li></ul>';

        
        $('.paid_ticket_btn1').click(function(e) {
          $('.passmain_content').addClass('hidden');
          $('.hide-free').addClass('hidden');
          $('.hide-donation').addClass('hidden');
          $('.hide-paid').addClass('hidden');
          $('.hide-on').removeClass('hidden');
          $('#addTicketList').append(Pass);
           $('#ticketvalue').val('pass');
          });
     //   
     $('.New_pass_appendedbox').removeClass('hidden');
     //$('#addTicketList').append(FreeTicket);
     //
     $('.ticketvalue').click(function(e) {
         // body...
           var ticketvalue =  $(this).data('ticketvalue')
           $('#ticketvalue').val(ticketvalue);
           $('.New_pass_appendedbox').removeClass('hidden');
           $('.passmain_content').addClass('hidden');
           //passmain_content
           //
           if(ticketvalue  == "paid"){

          $('.hide-paid').removeClass('hidden');
            $('.hide-on').addClass('hidden');
            $('#addTicketList').append(PaidTicket);
            $('.setting-paid-ticket').removeClass('hidden');
            $('#ticketvalue').val('paid');
           }
            if(ticketvalue  == "free"){
               $('.hide-free').removeClass('hidden');
          
              $('.hide-on').addClass('hidden');
                $('#addTicketList').append(FreeTicket);
                $('#ticketvalue').val('free');
           }
           if(ticketvalue  == "donation"){
            $('.hide-donation').removeClass('hidden');
            $('.hide-on').addClass('hidden');
                 $('#addTicketList').append(DonationTicket);
                 $('#ticketvalue').val('donation');
           }
         //inputs
     });
     
     $('.paid_ticket_btn').click(function(e){
      /*$('.New_pass_appendedbox').removeClass('hidden');
      $('.passmain_content').addClass('hidden');
      $('#addTicketList').append(Pass);*/
     });

     //remove added ticket row
  $(document).on('click','.ticket_removerow',function() {
      //$(this).parent().remove();
      $(this).closest(".listTable_row").remove();
      var sum = 0;     
        $('.qty-a').each(function() {
            sum += Number($(this).val());
        });
        if(sum != 0)
        {
          $('.listing-capacity-value').text(sum)
        }
        else{
          $('.listing-capacity-value').text('Unlimited') 
        }
    });
  $(document).on('click','.setting-click',function() {
      //$(this).parent().remove();
      var hiden = $('.aaa').val();
      if(hiden == "0"){
        $('.passmain_content').removeClass('hidden');
        $('.setting-paid-ticket').removeClass('hidden');
        $('.aaa').val("1");
      }
      if(hiden == "1"){
        $('.passmain_content').addClass('hidden');
        $('.aaa').val("0");
      }
    });
  $(document).on('click','.ticket-connect-pass',function() {
        $('#myModal').modal('show');
    });
  

    $(document).on('click','.setting-clicks',function() {
      //$(this).parent().remove();
      var hiden = $('.aaaa').val();
      if(hiden == "0"){
        $('.passmain_content1').removeClass('hidden');
        
        $('.setting-paid-ticket1').removeClass('hidden');
        $('.aa').val("1");
      }
      if(hiden == "1"){
        $('.passmain_content1').addClass('hidden');

        $('.aa').val("0");
      }
    });

    $(document).on('click','.apply',function() {
      //$(this).parent().remove();
      var hiden = $('.aa').val();
      if(hiden == "0"){
        $('.passmain_content1').removeClass('hidden');
        
        $('.setting-paid-ticket1').removeClass('hidden');
        $('.aa').val("1");
      }
      if(hiden == "1"){
        $('.passmain_content1').addClass('hidden');

        $('.aa').val("0");
      }
    });

     $(document).on('keyup','.qty-a',function() {
       var sum = 0;     
        $('.qty-a').each(function() {
            sum += Number($(this).val());
        });
        if(sum != 0)
        {
          $('.listing-capacity-value').text(sum)
        }
        else{
          $('.listing-capacity-value').text('Unlimited') 
        }
       
    });

  $(document).on('click','.copy-click',function() {
      //$(this).parent().remove();
      //$(this).closest(".listTable_row").remove();
      var ele = $(this).closest('.listTable_row').clone(true);
    $(this).closest('.listTable_row').after(ele);
    var sum = 0;     
        $('.qty-a').each(function() {
            sum += Number($(this).val());
        });
        if(sum != 0)
        {
          $('.listing-capacity-value').text(sum)
        }
        else{
          $('.listing-capacity-value').text('Unlimited') 
        }
    });

    $(document).on('click','.mw-link',function() {        
        var text = $(this).text();
        $('.mw-link').addClass('hidden');
        $('.event-total-capacity').removeClass('hidden');
        $('.event-total-capacity').val(text);
        $('#capacity-lbl').addClass('lbl-cap');
      });
});