@extends('layouts.master')
@section('title', "Where's the fun :: Complete-Event-Details")
{{-- ______________________ Start Main Content __________________ --}}
<link rel="stylesheet" href="{{asset('css/eventpage/richtext.min.css')}}">
<link rel='stylesheet' href="{{asset('css/eventpage/custom.css')}}">
<link rel="stylesheet" href="{{asset('css/eventpage/bootstrap-datetimepicker.min.css')}}">
{{--<link href="{{asset('admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">--}}
<script src="{{asset('js/moment.min.js')}}></script>
    <script src="{{asset('js/eventpage/jquery.bxslider.js')}}></script>
<link rel="stylesheet" href="{{asset('css/eventpage/jquery.bxslider.css')}}">
{{--<script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>--}}
{{--<script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>--}}
<div class="container-fluid profileSideBar">
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="card member-card">
                <div class="body">
                    <hr>
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#details">Event Details</a></li>
                        <li><a data-toggle="pill" href="#topics">Event Topics</a></li>
                        <li><a data-toggle="pill" href="#locations">Address Information</a></li>
                        <li><a data-toggle="pill" href="#tickets">Email Preferences</a></li>
                        <li><a data-toggle="pill" href="#design">Other Information</a></li>
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
                                <div class="form_bg_box">
                                    <h4>Basic information</h4>
                                    <div class="form-group">
                                        <label>What is your event called? </label>
                                        <span class="label_cap text-right char_limit">0/75</span>
                                        <input type="text" class="form-control" placeholder="Make it a short and
                                        catchy title" name="title" value="{{$event->title}}" id="event_title" required="" maxlength="75">
                                    </div>
                                    <div class="form-group">
                                        <label for="description"> Description </label>
                                        <span class="label_cap">This description will appear on the event listing page.</span>
                                        <textarea class="" id="description" name="description">{{$event->description}}</textarea>
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
                                            <div class="referral_append">
                                                <label>Referral code</label>
                                                <span class="label_cap">Do you have a referral code or did someone refer you to WTF Where’s The Fun?</span>
                                                <input type="text" class="form-control" placeholder="" name="referral_code" value="{{$event->referral_code}}">
                                                <label>Discount</label>
                                                <input type="number" class="form-control"  min="1" placeholder="Enter Discount in %" name="discount" value="{{$event->discount}}">
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
                                                    <div class="social-buttons-toggle">
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
                                        <div class="row">
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
                                            <button type="submit" class="btn btn-default profile-btn">Save</button>
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
                            <div class="add_category_main">
                                <form method="post" id="event-topics">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Event Topic</label>
                                            <select class="form-control" id="event_topic" name="event_topic">
                                                <option value="" @if(is_null($event->topic)){{'selected'}}@endif>Select Topic</option>
                                                @foreach ($eventTopics as $topic)
                                                    <option value="{{$topic->id}}"@if(!is_null($event->topic) && $topic->id == $event->event_topic_id){{'selected'}}@endif>{{$topic->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Event Sub-topic</label>
                                            <select class="form-control" id="event_sub_topic" name="event_sub_topic">
                                                <option value="" @if(is_null($event->sub_topic)){{'selected'}}@endif>Select Sub topic</option>
                                                @foreach ($eventSubTopics as $subTopic)
                                                    <option value="{{$subTopic->id}}" @if(!is_null($event->sub_topic) && $subTopic->id == $event->event_sub_topic_id){{'selected'}}@endif>{{$subTopic->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
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
                                            <label>Event Category</label>
                                            <select class="form-control" id="event_sub_topic" name="category">
                                                <option value="" @if(is_null($event->category)){{'selected'}}@endif>Select Event Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                    @if(!is_null($event->category) && $category->id == $event->category_id){{'selected'}}@endif>{{$category->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="applybutton_right">
                                            <button type="submit" class="btn btn-default profile-btn">Save</button>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$eventId}}" name="event_id">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="locations" class="tab-pane fade">
                <div class="contc-detail-wrap">
                    <div class="acnt-adrs-innertitle">
                        <h4>Event Time and Locations</h4>
                    </div>
                    <div class="shipping-address-inner">

                    </div>
                </div>
            </div>

            <div id="email" class="tab-pane fade">
                <div class="acnt-adrs-innertitle">
                    <h4>Email Preferences</h4>
                </div>
                <div class="email-preferences all-form">
                </div>
            </div>

            <div id="other" class="tab-pane fade">
                <div class="contc-detail-wrap">
                    <div class="acnt-adrs-innertitle">
                        <h4>Other Information</h4>
                    </div>
                    <div class="other-information-inner">
                    </div>
                </div>
            </div>

            <div id="change-password" class="tab-pane fade">
                <div class="contc-detail-wrap">
                    <div class="acnt-adrs-innertitle">
                        <h4>Change Password</h4>
                    </div>
                    <div class="other-information-inner">
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
<link rel="stylesheet" href="{{asset('js/ckeditor/contents.css')}}">

<script>
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

