
// Menu Toggle
//========================================
$('.banner-slider').owlCarousel({
    loop:false,
    margin:0,
    dots:false,
    nav: false,
    autoplay:true,
    autoplayTimeout:6000,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items:1,
            loop:true
        },
        600:{
            items:1,
            loop:true
        },
        1000:{
            items:1,
            loop:true
        }
    }
});

$('.blog-thumbnail-slider').owlCarousel({
    loop:false,
    margin:10,
    dots:false,
    nav: true,
  	navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
});

//Events Slide Homepage
$('.event-slider').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav: true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
    }
});

// Email adress change
//========================================
jQuery(document).ready(function(){
    jQuery(".chng-eml-btn").click(function(){
        jQuery(".eadrs-chnge-wrp").slideToggle("slow");
    });
});

// Organizer page URL 
//======================================

// Edit  btn
//=========================
$(document).ready(function(){
    $("#edit-url-link").click(function(){
        $("#organizer-url").hide();
        $("#organizer-edit-url-input").slideDown();
        $(this).hide();
    });

    // cancle btn URL 
    //========================
     $("#cancel-btn").click(function(){
        $("#organizer-url").show();
        $("#organizer-edit-url-input").hide();
        $("#edit-url-link").show();
    });

     $(".custom-tabs li").click(function(){
        $(".custom-tabs li").siblings().removeClass("active");
        $(this).addClass("active");
     });

    $(".organizer-dropdown").click(function () {
        $(this).find(".list").slideToggle();
        $(".list li").click(function () {
            var get_value = $(this).html();
            var get_parent = $(this).parent().parent().get(0);
            $(get_parent).find('.active').html('').append(get_value + "<i class='fa fa-chevron-down'></i>");
        });
    });

    $(".menu-toggle").click(function(){
       $(".main-menu-wrap").toggleClass("menu-active");
    });

});

      // Add social account btn
    //========================
    $(document).ready(function(){
        $("#add-ccount-social").click(function(){
            $("#add-social-network").slideToggle("slow");
        });

        $("#add-account-cancel-btn").click(function(){
            $("#add-social-network").slideUp("slow");
        });
    });

// Total capacity tooltip 
//======================================
    $(function () {
     $('[data-toggle="tooltip"]').tooltip()
    })

//  Reserved Seating  switch
//======================================
$(document).ready(function(){
    $(".tf-reserved-seating-switch input").click(function(){
        $(".tf-field-section").toggle();
        $(".tf-venue-map").toggle();
    });
});

//  Testimonial js
//======================================

$('.testimonial-wrap').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn', 
    loop:true,
    margin:0,
    dots:false,
    nav: true,
    navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    items:1

});
//  Close account page radio btn cheched on focus
//====================================== 
    $("#other-pls-explain-input").focus(function(){
        /*jQuery("#other-pls-explain").attr('checked', true);*/
        /*$("#other-pls-explain").attr('checked', 'checked');*/
        jQuery('input:radio[name="clseacnt"]').filter('[id="other-pls-explain"]').attr('checked', ture);
    });


//   Listing Privacy radio btn
//======================================
$(document).ready(function(){
    $("#accessible-only").click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".listing-privary-checkbox").not(targetBox).show();
        $(".listing-privacy-evnt-typ-wrap").not(targetBox).hide();
    });
    $("#dribution-partners").click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".listing-privary-checkbox").hide();
        $(".listing-privacy-evnt-typ-wrap").not(targetBox).show();
    });
});

//   Event title
//======================================
$(document).ready(function(){
    $(".event-title-wrap .form-control").focus(function(){
        $(".event-title-bottom-dis").show();
    });
     $(".event-title-wrap .form-control").focusout(function(){
        $(".event-title-bottom-dis").hide();
    });
});
$(document).ready(function(){
    $(".event-title-wrap .form-control").focus(function(){
        $(".event-title-bottom-dis").show();
    });
     $(".event-title-wrap .form-control").focusout(function(){
        $(".event-title-bottom-dis").hide();
    });
});

//   Event Details social link show hide
//======================================

jQuery(document).ready(function(){
    jQuery("#link-fb-twit").click(function(){
        jQuery(".evnt-detls-link-social-wrap").slideToggle("slow");
    });
});

//   Organizer Name Edit and Remove
//======================================

    //   Organizer Name Edit
    //======================================

    jQuery(document).ready(function(){
        jQuery("#organizer-name-link-Edit-btn").click(function(){
            jQuery(".edit-this-organizer-wrap").slideDown();
            jQuery(".organizer-name-cancle-btn").show();
            jQuery("#organizer-name-link-addnew-btn").hide();
            jQuery(".evnt-detls-organizer-name-select-box").hide();
            jQuery(".evnt-detls-orgenizer-dis").hide();
            
            jQuery(this).hide();
        });
        jQuery(".organizer-name-cancle-btn").click(function(){
            jQuery(".edit-this-organizer-wrap").slideUp();
            jQuery("#organizer-name-link-Edit-btn").show();
            jQuery(".evnt-detls-organizer-name-select-box").show();
            jQuery(".evnt-detls-orgenizer-dis").show();
            jQuery(this).hide();
        });

        jQuery("#organizer-name-link-addnew-btn").click(function(){
            jQuery(".add-new-organizer-name-wrap").slideDown();
            jQuery(".organizer-name-cancle-btn").show();
            jQuery("#organizer-name-link-Edit-btn").hide();
            jQuery(".evnt-detls-organizer-name-select-box").hide();
            jQuery(".evnt-detls-orgenizer-dis").hide();
            jQuery(this).hide();
        });

        jQuery(".organizer-name-cancle-btn").click(function(){
            jQuery(".add-new-organizer-name-wrap").slideUp();
            jQuery("#organizer-name-link-addnew-btn").show();
            jQuery(".evnt-detls-organizer-name-select-box").show();
            jQuery(".evnt-detls-orgenizer-dis").show();
            jQuery(this).hide();
        });

    });

//   Event details tips
//====================================== 
$(document).ready(function(){
    $(".evnt-detls-heading-tips-btn").click(function(){
        $(".evnt-detls-tips-box").slideToggle("slow");
    });
    $(".tf-field-heading-tips-btn").click(function(){
        $(".tf-field-tips-box").slideToggle("slow");
    });
    $(".as-heading-tips-btn").click(function(){
        $(".as-tips-box").slideToggle("slow");
    });
});


//   Event Details Location
//====================================== 
$(document).ready(function(){
    $(".use-past-location").click(function(){
        $(".location-dropdown").show();
        $(".find-new-vanue").show();
        $(".enter-adress").hide();
        $(".location-input").hide();
        $(this).hide();
    });

     $(".find-new-vanue").click(function(){
        $(".location-dropdown").hide();
        $(".use-past-location").show();
        $(".enter-adress").show();
        $(".location-input").show();
        $(this).hide();
    });

    $(".online-event").click(function(){
        $(".add-loction").show();
        $(".use-past-location").hide();
        $(".enter-adress").hide();
        $(this).hide();
        $(".find-new-vanue").hide();
        $(".location-dropdown").hide();
        $(".location-input").hide();
        $(".online-event-message").show();
    });

    $(".add-loction").click(function(){
        $(".use-past-location").show();
        $(".enter-adress").show();
        $(".online-event").show();
        $(".online-event-message").hide();
        $(".location-input").show();
        $(this).hide();
    });
   
   $(".enter-adress").click(function(){
        $(".use-past-location").hide();
        $(".location-input").hide();
        $(".online-event").hide();
        $(".enter-adress-box").slideDown();
        $(".reset-loction").show();
        $(this).hide();
    });
   $(".reset-loction").click(function(){
        $(".use-past-location").show();
        $(".location-input").show();
        $(".online-event").show();
        $(".enter-adress-box").slideUp();
        $(".enter-adress").show();
        $(this).hide();
    });
});

//   Time date Schedule
//====================================== 
$(document).ready(function(){
    $(".schedule-multiple-events-btn").click(function(){
        $(".schedule-multiple-events-wrap").slideDown("slow");
        $(".evnt-detls-time_date").hide();
        $(".evnt-detls-time_date-link").hide();
    });
     $(".schedule-multiple-events-btn-cancle").click(function(){
        $(".schedule-multiple-events-wrap").slideUp();
        $(".evnt-detls-time_date").show();
        $(".evnt-detls-time_date-link").show();
    });
     $(".timezone-date-setting-btn").click(function(){
        $(".timezone-settings-wrap").slideDown();
        $(".evnt-detls-time_date").hide();
        $(".evnt-detls-time_date-link").hide();
    });
     $(".timezone-settings-btn-cancle").click(function(){
        $(".timezone-settings-wrap").slideUp();
        $(".evnt-detls-time_date").show();
        $(".evnt-detls-time_date-link").show();
    });
});


//   Steps  form
//====================================== 


function stepnext(n){

    if(n != 0){
        //$(".stepwizard-row a").switchClass('btn-primary','btn-default');
        $(".stepwizard-row a").removeClass('btn-primary');
        $(".stepwizard-row a").addClass('btn-default');
        $('.stepwizard a[href="#step-'+n+'"]').tab('show');
        //$('.stepwizard-row a[href="#step-'+n+'"]').switchClass('btn-default','btn-primary');
        $('.stepwizard-row a[href="#step-'+n+'"]').removeClass('btn-default');
        $('.stepwizard-row a[href="#step-'+n+'"]').addClass('btn-primary');
    }
}
stepnext(1);


$(document).ready(function(){
    $(".step_1").click(function(){
        $(".create-events").addClass("ce-step1");
        $(".create-events").removeClass("ce-step2");
        $(".create-events").removeClass("ce-step3");
        $(".create-events").removeClass("ce-step4");

    });
    $(".step_2").click(function(){
        $(".create-events").addClass("ce-step2");
        $(".create-events").removeClass("ce-step1");
        $(".create-events").removeClass("ce-step3");
        $(".create-events").removeClass("ce-step3");
    });
    $(".step_3").click(function(){
        $(".create-events").addClass("ce-step3");
        $(".create-events").removeClass("ce-step1");
        $(".create-events").removeClass("ce-step2");
        $(".create-events").removeClass("ce-step4");
    });
    $(".step_4").click(function(){
        $(".create-events").addClass("ce-step4");
        $(".create-events").removeClass("ce-step1");
        $(".create-events").removeClass("ce-step2");
        $(".create-events").removeClass("ce-step3");
    });
});


//   tag icon toggle
//====================================== 

    $(document).ready(function(){
        $(".con-l_header-tag_btn").click(function(){
            $(".con-l_tag-submenu").slideToggle();
        });
    });



//   profile row delete idit
//====================================== 

    $(document).ready(function(){
        $(".con_listing-items-btn").on("click", function(){
            $(this).next(".con_listing-items-dropdown").slideToggle();
        });
    });


//            Form Dashboard Menu
//========================================
    $(document).ready(function(){
        $(".fd-menu-drowbtn").on("click", function(){
            $(this).next(".fd-menu-dropdown").slideToggle();
        });
    });

//        form Dashboard Profile Toggle 
//========================================

    $(document).ready(function(){
        $(".fd-pro-tgl-btn").click(function(){
            $(".fd-pro-tgl-box").slideToggle();
        });
    });


//            Form popup
//========================================

//            CSV file Upload
//========================================

/*    $(document).ready(function(){
        document.getElementByClassName("csv-ubtn").onchange = function () {
            document.getElementByClassName("csv-ufile").value = this.value;
        };
    });
*/

//            XlSX file Upload
//========================================
/*
    $(document).ready(function(){
        document.getElementById("fp-xlsx-ubtn").onchange = function () {
            document.getElementByClassName("fp_xlsx-uf").value = this.value;
        };
    });*/


//           Form Popup CSV page
//========================================

    $(document).ready(function(){
        $(".fp-csv").on("click", function(){
             $(".fp_list-wrap").hide();
            /*$(this).next(".fp-csv-des").show();*/
            $(".fp-csv-des").show();
            $(".fp_iback").show();
            $(".close").hide();
        });
    });

//           Form Popup manual page
//========================================

    $(document).ready(function(){
        $(".fp-manual").on("click", function(){
             $(".fp_list-wrap").hide();
            $(".fp_manual").show();
            $(".fp_iback").show();
            $(".close").hide();
        });
    });



//         Form Popup XLSX page
//========================================

    $(document).ready(function(){
        $(".fp-xlsx").on("click", function(){
             $(".fp_list-wrap").hide();
            $(".fp-xlsx-des").show();
            $(".fp_iback").show();
            $(".close").hide();
        });
    });

//           Form Popup mamual btn
//========================================

$(document).ready(function(){
        $(".fp-mbtn").click(function(){
            $(".fp_manual-mbox").slideToggle();
        });
    });


//           Form Popup Past Event
//========================================

    $(document).ready(function(){
        $(".pevnt-btn").on("click", function(){
             $(".fp_list-wrap").hide();
            $(".fp-pevnt").show();
            $(".fp_iback").show();
            $(".close").hide();
        });
    });


//           Form Popup Step Back btn
//========================================

    $(document).ready(function(){
        $(".fp_iback").click(function(){
            $(".fp_list-wrap").show();
            $(".close").show();
            $(".fp-csv-des").hide();
            $(".fp_manual").hide();
            $(".fp-xlsx-des").hide();
            $(".fp-pevnt").hide();
            $(this).hide();
        });
    });  

//            End 
//========================================
