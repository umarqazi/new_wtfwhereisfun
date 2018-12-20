@extends('layouts.master')
@section('title', "Create Event")
@section('content')
    <link rel="stylesheet" href="{{asset('css/eventpage/richtext.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/eventpage/bootstrap-datetimepicker.min.css')}}">
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/eventpage/jquery.bxslider.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/eventpage/jquery.bxslider.css')}}">

    <div class="container-fluid profileSideBar">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="card member-card">
                    <div class="body">
                        <hr>
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#details">Event Details</a></li>
                            <li><a data-toggle="pill" href="JavaScript:void(0);" onclick="promptForDetails(event,this)">Event Topics</a></li>
                            <li><a data-toggle="pill" href="JavaScript:void(0);" onclick="promptForDetails(event,this)">Event Time and Locations</a></li>
                            <li><a data-toggle="pill" href="JavaScript:void(0);" onclick="promptForDetails(event,this)">Event Tickets</a></li>
                            <li><a data-toggle="pill" href="JavaScript:void(0);" onclick="promptForDetails(event,this)">Event Layouts and Images</a></li>
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
                                <form method="post" name="mapdata" id="event-create" enctype="multipart/form-data">
                                    <div class="form_bg_box basicInformationWrapper">
                                        <h4>Basic information</h4>
                                        <div class="form-group">
                                            <label>What is your event called? <span class="required-field">*</span></label>
                                            <span class="label_cap text-right char_limit">0/75</span>
                                            <input type="text" class="form-control" placeholder="Make it a short and catchy title" name="title" id="event_title" required="" maxlength="75">
                                            <div class="form-error title"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description"> Description <span class="required-field">*</span></label>
                                            <span class="label_cap">This description will appear on the event listing page.</span>
                                            <textarea class="" id="description" name="description"></textarea>
                                            <div class="form-error description"></div>
                                        </div>
                                        <div class="add_contact_referal">
                                            <div class="add_contact_detail">
                                                <a href="JavaScript:void(0);" class="contact_toogle"> <i class="fa fa-plus"></i> Add contact details</a>
                                                <div class="contact_append">
                                                    <label>Contact details</label>
                                                    <span class="label_cap">Your contact information is kept private and shown only to attendees who book a ticket.</span>
                                                    <input type="text" class="form-control" placeholder="Enter an email address or phone number" name="contact">
                                                </div>
                                            </div>
                                            <div class="enter_referal_code">
                                                <a href="JavaScript:void(0);" class="refferal_toogle"> <i class="fa fa-plus"></i> Enter a referral code</a>
                                                <div class="referral_append">
                                                    <label>Referral code</label>
                                                    <span class="label_cap">Do you have a referral code or did someone refer you to WTF Where’s The Fun?</span>
                                                    <input type="text" class="form-control" placeholder="" name="referral_code">
                                                    <label>Discount</label>
                                                    <input type="number" class="form-control"  min="1" placeholder="Enter Discount in %" name="discount">

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
                                                            <a href="JavaScript:void(0);" class="public_toggle active">Public</a>
                                                            <a href="JavaScript:void(0);" class="unlisted_toogle">Unlisted</a>
                                                            <input type="hidden" name="access" id="event_show" value="public">
                                                        </div>
                                                        <div class="social-buttons-toggle">
                                                            <label class="switch">
                                                                <input type="checkbox" checked name="is_shareable" value="1">
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
                                                        <input type="checkbox" name="event_on_off" id="event_on_off">
                                                        <span class="slider round"></span>
                                                    </label>
                                                    <span> Online Event</span>
                                                    <input type="hidden" name="is_online" id="on_off_event" value="0">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label> Additional order message </label>
                                            <span class="label_cap">This message will appear on the ticket confirmation email and on the ticket itself.</span>
                                            <textarea class="content_editor1" name="additional_message"></textarea>
                                        </div>
                                        <div class="form-group Refund_Policy">
                                            <label> Set a refund policy </label>
                                            <select class="form-control" name="refund_policy" required>
                                                <option disabled selected>Select Refund Policy</option>
                                                @foreach($refundPolicies as $refund)
                                                    <option value="{{$refund->id}}">{{$refund->text}}</option>
                                                @endforeach
                                            </select>
                                            <span class="label_cap">If your refund policy is changed after tickets have been sold, the new policy will apply to future orders only. <br> Any free order can be cancelled by the buyer at any time.<a href="#"> Learn more.</a></span>
                                        </div>

                                        <div class="form-group Refund_Policy">
                                            <label> Select an Organizer <span class="required-field">*</span></label>
                                            <select class="form-control" name="organizer_id" required>
                                                <option disabled selected>Select Organizers</option>
                                                @foreach($organizers as $organizer)
                                                    <option value="{{$organizer->id}}">{{$organizer->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-error organizer_id"></div>
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
                                                <input type="submit" id="save-temp" name="temp-save" class="btn-save rounded-border" value="Save & Continue">
                                            </div>
                                        </div>

                                    </div>
                                </form>
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
    {{--<link rel="stylesheet" href="{{asset('css/ckeditor/content.css')}}">--}}

    <script>
        var config = {
            language : 'en',
            height : '150',
            width : '1090',
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