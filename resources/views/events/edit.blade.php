@extends('layouts.master')
@section('title', "Where's the fun :: Complete-Event-Details")
@section('content')
    {{-- ______________________ Start Main Content __________________ --}}
    <link rel="stylesheet" href="{{asset('css/eventpage/richtext.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/eventpage/bootstrap-datetimepicker.min.css')}}">
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/eventpage/jquery.bxslider.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/fancybox/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/eventpage/jquery.bxslider.css')}}">
    <link rel="stylesheet" href="{{asset('listgo/css/listgo-custom.css')}}">

    <div class="container-fluid profileSideBar">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="card member-card">
                    <div class="body">
                        <hr>
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#details">Event Details</a></li>
                            <li><a data-toggle="pill" href="#topics">Event Topics</a></li>
                            <li><a data-toggle="pill" href="#locations">Event Time and Locations</a></li>
                            <li><a data-toggle="pill" href="#tickets">Event Tickets</a></li>
                            <li><a data-toggle="pill" href="#layouts">Event Layouts and Images</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    <div id="details" class="tab-pane fade in active">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Event Details</h4>
                            </div>
                            <div class="contc-detail-inner">
                                <form method="post" name="mapdata" id="event-details" enctype="multipart/form-data">
                                    <div class="form_bg_box basicInformationWrapper">
                                        <h4>Basic information</h4>
                                        <div class="form-group">
                                            <label>What is your event called? </label>
                                            <span class="label_cap text-right char_limit">0/75</span>
                                            <input type="text" class="form-control" placeholder="Make it a short and
                                        catchy title" name="title" value="{{$event->title}}" id="event_title" required="" maxlength="75">
                                            <div class="form-error title"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description"> Description </label>
                                            <span class="label_cap">This description will appear on the event listing page.</span>
                                            <textarea class="" id="description" name="description">{{$event->description}}</textarea>
                                            <div class="form-error description"></div>
                                        </div>
                                        <div class="add_contact_referal">
                                            <div class="add_contact_detail">
                                                @if(empty($event->contact))
                                                    <a href="JavaScript:void(0);" class="contact_toogle"> <i class="fa fa-plus"></i> Add contact details</a>
                                                @endif
                                                <div class="contact_append">
                                                    <label>Contact details</label>
                                                    <span class="label_cap">Your contact information is kept private and shown only to attendees who book a ticket.</span>
                                                    <input type="text" class="form-control" placeholder="Enter an email address or phone number"
                                                           value="{{$event->contact}}" name="contact">
                                                </div>
                                            </div>
                                            <div class="enter_referal_code">
                                                @if(empty($event->referral_code))
                                                    <a href="JavaScript:void(0);" class="refferal_toogle"> <i class="fa fa-plus"></i> Enter a referral code</a>
                                                @endif
                                                <div class="referral_append" @if(!empty($event->referral_code)) style="display: block;" @endif>
                                                    <label>Referral code</label>
                                                    <span class="label_cap">Do you have a referral code or did someone refer you to WTF Where’s The Fun?</span>
                                                    <input type="text" class="form-control" placeholder="" name="referral_code" value="{{$event->referral_code}}">
                                                    <label>Discount</label>
                                                    <input type="number" class="form-control"  min="1" placeholder="Enter Discount in %" name="discount" value="{{$event->discount}}">
                                                    <div class="form-error discount"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add_category_main">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="who_see_event">
                                                        <label>Who can see my event?</label>
                                                        <span class="label_cap">Anyone can see and search for public events.</span>
                                                        <div class="public_unlisted clearfix">
                                                            <a href="JavaScript:void(0);" class="public_toggle @if($event->access == 'public'){{'active'}}@endif">Public</a>
                                                            <a href="JavaScript:void(0);" class="unlisted_toogle @if($event->access == 'unlisted'){{'active'}}@endif">Unlisted</a>
                                                            <input type="hidden" name="access" id="event_show" value="{{$event->access}}">
                                                        </div>
                                                        <div class="social-buttons-toggle" @if($event->access == 'unlisted')style="display:inline-block"@endif>
                                                            <label class="switch">
                                                                <input type="checkbox" @if($event->is_shareable == 1){{'checked'}}@endif name="is_shareable" value="1">
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <span>Share buttons</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="add_category_main">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6 chk-on-off">
                                                    <label class="switch ">
                                                        <input type="checkbox" name="is_online" id="event_on_off" @if($event->is_online){{"checked"}}@endif value="1">
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <span> Online Event</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label> Additional order message </label>
                                            <span class="label_cap">This message will appear on the ticket confirmation email and on the ticket itself.</span>
                                            <textarea class="content_editor1" name="additional_message">{{$event->additional_message}}</textarea>
                                        </div>
                                        <div class="form-group Refund_Policy">
                                            <label> Set a refund policy </label>
                                            <select class="form-control" name="refund_policy">
                                                <option value="" disabled="" @if(is_null($event->refund_policy)){{'selected'}}@endif>Select Refund Policy</option>
                                                @foreach($refundPolicies as $refund)
                                                    <option @if(!is_null($event->refund_policy) && $event->refund_policy_id == $refund->id){{'selected'}}@endif
                                                            value="{{$refund->id}}">{{$refund->text}}</option>
                                                @endforeach
                                            </select>
                                            <span class="label_cap">If your refund policy is changed after tickets have been sold, the new policy will apply to future orders only. <br> Any free order can be cancelled by the buyer at any time.<a href="#"> Learn more.</a></span>
                                        </div>

                                        <div class="form-group Refund_Policy">
                                            <label> Select an Organizer</label>
                                            <select class="form-control" name="organizer_id" required>
                                                <option value="" disabled="" @if(is_null($event->organizer)){{'selected'}}@endif>Select Organizer</option>
                                                @foreach($organizers as $organizer)
                                                    <option @if(!is_null($event->organizer) && $event->organizer_id == $organizer->id){{'selected'}}@endif
                                                            value="{{$organizer->id}}">{{$organizer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <h4>Payment preferences</h4>
                                            <p>Currently, your payments are powered by PayPal Payments. Payments will securely transfer into your account via direct deposit or receiving a check in the mail (US & Canada only). Don't worry, you can switch to Stripe Payments if you'd like in Manage, but you'll be required to setup a Stripe account first.</p>
                                            <div class="payment_pre_img">
                                                <img style="width:10%" src="{{asset('images/paypal.png')}}">
                                                <img src="{{asset('images/img1.svg')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="applybutton_right">
                                                <button type="submit" class="btn btn-default profile-btn rounded-border">Save & Continue</button>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$eventId}}" name="event_id">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="topics" class="tab-pane fade in">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Event Topics And Category</h4>
                            </div>
                            <div class="event-topics-detail-inner">
                                <div class="">
                                    <form method="post" id="event-topics">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Event Category</label>
                                                <select class="form-control" name="category">
                                                    <option value="" @if(is_null($event->category)){{'selected'}}@endif>Select Event Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}"
                                                        @if(!is_null($event->category) && $category->id == $event->category_id){{'selected'}}@endif>{{$category->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Event Type</label>
                                                <select class="form-control" id="event_type" name="event_type">
                                                    <option value="" @if(is_null($event->type)){{'selected'}}@endif>Select Event Type</option>
                                                    @foreach($eventTypes as $type)
                                                        <option value="{{$type->id}}"
                                                        @if(!is_null($event->type) && $type->id == $event->event_type_id){{'selected'}}@endif>{{$type->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Event Topic</label>
                                                <select class="form-control" id="event_topic" name="event_topic">
                                                    <option value="" @if(is_null($event->topic)){{'selected'}}@endif>Select Topic</option>
                                                    @foreach ($eventTopics as $topic)
                                                        <option value="{{$topic->id}}"@if(!is_null($event->topic) && $topic->id == $event->event_topic_id){{'selected'}}@endif>{{$topic->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 event-tags">
                                                <label>Event Tags</label>
                                                <select multiple data-role="tagsinput" name="event_tags[]" onkeypress="return event.keyCode != 13;">
                                                    @if(!$eventTags->isEmpty())
                                                        <option value="hell">Hell</option>
                                                        @foreach($eventTags as $tag)
                                                            <option value="{{$tag->name}}">{{$tag->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="applybutton_right">
                                                <button type="submit" class="btn btn-default profile-btn rounded-border">Save & Continue</button>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$eventId}}" name="event_id">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="locations" class="tab-pane fade">
                        @include('events.partials.edit-time-location')
                    </div>

                    <div id="tickets" class="tab-pane fade">
                        @include('events.partials.edit-tickets')
                    </div>

                    <div id="layouts" class="tab-pane fade">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Event Layouts and Image Uploading</h4>
                            </div>
                            <div class="shipping-address-inner">
                                <div class="event-layout-listing">
                                    <div class="p-top-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="listings">
                                                    <form method="post" id="event-layout" onsubmit="updateEventLayout(this)" enctype="multipart/form-data">
                                                        <div class="row layout-listing">
                                                            <input type="hidden" id="event_layout_id" name="event_layout" value="{{$event->event_layout_id}}">
                                                            <input type="hidden" id="" name="event_id" value="{{$eventId}}">
                                                            @php $asset = asset('img'); @endphp
                                                            @foreach($layouts as $layout)
                                                                <div class="col-sm-6 col-lg-3">
                                                                    <div class="listing listing--grid1 @if($layout->id == $event->event_layout_id){{"active"}} @endif" onclick="selectLayout(this)" id="{{$layout->id}}">
                                                                        <div class="listing__media">
                                                                            <div class="mask"></div>
                                                                            <a class="zoomIcon fancybox" data-fancybox="gallery" data-caption="Event Template" href="{{$asset.'/'.$layout->image}}">
                                                                                <i class="fa fa-search"></i>
                                                                                <i class="fa fa-check"></i>
                                                                            </a>
                                                                            <img src="{{$asset.'/'.$layout->image}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row upload-imges-row">
                                                            @if(!empty($event->header_image))
                                                                @php
                                                                    $browseClass = 'hidden';
                                                                    $imgClass    = 'show-block';
                                                                    $toolClass   =  'hidden';
                                                                    $header_image=  $directory['web_path'].$event->header_image;
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $browseClass = 'show-block';
                                                                    $imgClass    = 'hidden';
                                                                    $toolClass   =  '';
                                                                    $header_image=  '';
                                                                @endphp
                                                            @endif
                                                            <div class="col-md-12">
                                                                <div class="tooltipContainer">
                                                                    <div class="customToolTip">
                                                                        <h1>Photos</h1>
                                                                        <p>Files must be in JPEG, JPG, PNG.
                                                                            <br>
                                                                            Image size must be 1600 X 700
                                                                        </p>
                                                                    </div>
                                                                    <label class="header-img">
                                                                        <input type="file" style="display: none" name="header_image" onchange="eventImageUpdate(this, 'header')">
                                                                        <img src="{{$header_image}}" id="header-image" class="main-img {{$imgClass}}">
                                                                        <div class="label-content {{$browseClass}}">
                                                                            <div class="browse-icon"></div>
                                                                            Browse
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            @if(count($event->images))
                                                                @php
                                                                    $browseClass = 'hidden';
                                                                    $imgClass    = 'show-block';
                                                                    $removeBtn   = 'show-block';
                                                                    $toolClass   =  'hidden';
                                                                    $disableEvent= 'disable-events';
                                                                @endphp
                                                                @foreach($event->images as $img)
                                                                    @php
                                                                        $imgSrc      =  $directory['web_path'].$img->name;
                                                                        $imgId       =  encrypt_id($img->id);
                                                                    @endphp
                                                                    <div class="col-md-4">
                                                                        <div class="tooltipContainer">
                                                                            <button type="button" class="remove-button {{$removeBtn}}" id="" onclick="removeEventImage(this, '{{$imgId}}')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                            <label class="header-img {{$disableEvent}}">
                                                                                <img src="{{$imgSrc}}" id="gallery-image-{{$imgId}}" class="main-img {{$imgClass}}">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                @php
                                                                    $browseClass = 'show-block';
                                                                    $imgClass    = 'hidden';
                                                                    $imgSrc      =  '';
                                                                    $removeBtn   = 'hidden';
                                                                    $imgId       = null;
                                                                    $toolClass   =  '';
                                                                    $disableEvent= '';
                                                                @endphp

                                                                <div class="col-md-4">
                                                                    <div class="tooltipContainer">
                                                                        <div class="customToolTip {{$toolClass}}">
                                                                            <h1>Photos</h1>
                                                                            <p>Files must be in JPEG, JPG, PNG.
                                                                                <br>
                                                                                Image size must be 600 X 600
                                                                            </p>
                                                                        </div>
                                                                        <button type="button" class="remove-button {{$removeBtn}}" onclick="removeEventImage(this, '{{'imgid'}}')">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                        <label class="header-img {{$disableEvent}}">
                                                                            <input type="hidden" name="event_id" id="event_id" value="{{$eventId}}">
                                                                            <input type="file" style="display: none" name="gallery_image" onchange="eventImageUpdate(this,'gallery')">
                                                                            <img src="" id="gallery-image-{{mt_rand()}}" class="main-img {{$imgClass}}">
                                                                            <div class="label-content {{$browseClass}}">
                                                                                <div class="browse-icon"></div>
                                                                                Browse<br>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endif


                                                        </div>
                                                        <div class="form-group">
                                                            <div class="applybutton_right">
                                                                <button type="button" onclick="addNewImage('{{$eventId}}')" class="btn btn-default rounded-border"><i class="fa fa-plus"></i> Add More Images</button>
                                                                <button type="submit" class="btn btn-default btn-save rounded-border">Save Draft</button>
                                                                <a href="{{url('events/'.$eventId)}}" target="_blank" class="btn btn-default btn-save rounded-border">Preview</a>

                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form method="post" onclick="eventGolive(event, this)">
                                                        <input type="hidden" name="event_id" value="{{$eventId}}">
                                                        <button type="submit" class="btn btn-default btn-save rounded-border">Go Live</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/ckeditor/config.js')}}"></script>
    <script src="{{asset('js/ckeditor/styles.js')}}"></script>
    {{--<link rel="stylesheet" href="{{asset('js/ckeditor/contents.css')}}">--}}

    @php
        $previousUrl = explode('/', URL::previous());
        $previousUrl = end($previousUrl);
    @endphp
    <script>
        var url = "{{$previousUrl}}";
        if(url == 'create'){
            setTimeout(function(){
                nextTab();
            },2000);
        }
        var config = {
            language : 'en',
            height : '250',
            width : '',
            colorButton_colors : 'F00,FF8C00,FFFF00,3A9D23,318CE7,0FF,00FF00,FF00FF',
        };

        CKEDITOR.replace( 'description' ,config);
        timer = setInterval(updateDiv,100);
        function updateDiv(){
            var editorText = CKEDITOR.instances.description.getData();
            $('#description').html(editorText);
        }
    </script>

@endsection