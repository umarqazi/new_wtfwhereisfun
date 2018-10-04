@extends('layouts.master')
@section('title', "Where's the fun :: Complete-Event-Details")
{{-- ______________________ Start Main Content __________________ --}}
<link rel="stylesheet" href="{{asset('css/eventpage/richtext.min.css')}}">
<link rel='stylesheet' href="{{asset('css/eventpage/custom.css')}}">
<link rel="stylesheet" href="{{asset('css/eventpage/bootstrap-datetimepicker.min.css')}}">
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/eventpage/jquery.bxslider.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/fancybox/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('css/eventpage/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('listgo/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('listgo/css/listgo-custom.css')}}">

{{--<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.31&amp;region=GB&amp;language=en-gb&amp;key=AIzaSyBJTHy8pvEzQsmBKZ_KQMT2qkx-6xajRA4&amp;libraries=places"></script>--}}
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
                                        <div class="row">
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
                                            <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$eventId}}" name="event_id">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="locations" class="tab-pane fade">
                    <div class="contc-detail-wrap">
                        <div class="acnt-adrs-innertitle">
                            <h4>When and where is your event?</h4>
                        </div>
                        <div class="shipping-address-inner">
                            <div class="time-location-rows">
                                @if(count($locations))
                                    @foreach($locations as $location)
                                        <div class="row">
                                            <form method="get" onsubmit="eventLocationForm(event, this)">
                                                <div class="col-sm-6 datepicker_row" id="datetime_area">
                                                    <div class="form-group">
                                                        <label>Event Start Date</label>
                                                        <div class="input-group date datepicker1" id="datetimepicker1">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                            <input autocomplete="off" type="text" class="form-control datepic" disabled value="{{$location->starting}}" name="start_date" id="start_date"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 datepicker_row" id="datetime_area">
                                                    <div class="form-group">
                                                        <label>Event End Date</label>
                                                        <div class="input-group date datepicker2" id="datetimepicker2">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                            <input autocomplete="off" type="text" class="form-control" value="{{$location->starting}}" name="end_date" id="end_date" disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Event location</label>
                                                        <input type="text" class="form-control event_location-serach" value="{{$location->location}}" placeholder="Enter your event's location" name="event_location" id="event_location"  >
                                                        <input type="hidden" name="latitude" id="event_lat" value="{{$location->longitude}}">
                                                        <input type="hidden" name="longitude" id="event_lng" value="{{$location->longitude}}">

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address </label>
                                                        <input type="text" class="form-control event_location-serach" placeholder="Enter your event's address" value="{{$location->address}}" name="event_address" id="event_address" disabled >
                                                    </div>
                                                    <div class="display-currency-section">
                                                        <div class="display-currency">
                                                            <label>Display Currency </label>
                                                            <select name="display_currency" id="currencynew" disabled >
                                                                <option disabled value="" @if(is_null($location->display_currency)){{"selected"}}@endif>Select Display Currency</option>
                                                                @foreach($currencies as $currency)
                                                                    <option value="{{$currency->id}}"
                                                                    @if(!is_null($location->display_currency) && $currency->id ==  $location->display_currency_id){{'selected'}}@endif>{{$currency->code}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="display-currency">
                                                            <label>Transacted Currency</label>
                                                            <select name="transacted_currency" disabled >
                                                                <option disabled value="" @if(is_null($location->transacted_currency)){{"selected"}}@endif>Select Transacted Currency</option>
                                                                @foreach($currencies as $currency)
                                                                    <option value="{{$currency->id}}"
                                                                    @if(!is_null($location->transacted_currency) && $currency->id ==  $location->transacted_currency_id){{'selected'}}@endif>{{$currency->symbol.' '.$currency->code}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Timezones</label>
                                                        <select name="timezone" disabled >
                                                            <option disabled value="" @if(is_null($location->timezone)){{"selected"}}@endif>Select Timezone</option>
                                                            @foreach($timeZones as $timeZone)
                                                                <option value="{{$timeZone->id}}"
                                                                @if(!is_null($location->timezone) && $timeZone->id == $location->timezone_id){{'selected'}}@endif>{{$timeZone->text}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="applybutton_right">
                                                            <button type="submit" class="btn btn-default profile-btn">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="location_map" id="location_map">
                                                        <div style="width: 450px; height: 300px;">
                                                            {!! Mapper::render() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$eventId}}" name="event_id">
                                                <input type="hidden" value="{{$location->id}}" name="time_location_id">
                                                <input type="hidden" value="update" name="request_type">
                                            </form>
                                        </div>
                                        <div class="row text-right add-location-row">
                                            <a href="JavaScript:void(0);" class="" onclick="addNewLocationRow()"><i class="fa fa-plus"></i> Add another Event Location</a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        <form type="post" onsubmit="eventLocationForm(event, this)" id="event-save-location">
                                            <div class="col-sm-6 datepicker_row" id="datetime_area">
                                                <div class="form-group">
                                                    <label>Event Start Date</label>
                                                    <div class="input-group date datepicker1" id="datetimepicker1">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                        <input autocomplete="off" type="text" class="form-control datepic" name="event_start_date" id="start_date"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 datepicker_row" id="datetime_area">
                                                <div class="form-group">
                                                    <label>Event End Date</label>
                                                    <div class="input-group date datepicker2" id="datetimepicker2">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                        <input autocomplete="off" type="text" class="form-control" name="event_end_date" id="end_date"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Event location</label>
                                                    <input type="text" onkeyup="searchLocation(event, this)"
                                                           class="form-control event_location-serach event_location" placeholder="Enter your event's location" name="event_location" id="event_location">
                                                    <input type="hidden" name="latitude" id="event_lat">
                                                    <input type="hidden" name="longitude" id="event_lng">
                                                    <div class="form-error event_location"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address </label>
                                                    <input type="text" class="form-control event_address event_location-serach" placeholder="Enter your event's address" name="event_address" id="event_address">
                                                    <div class="form-error event_address"></div>
                                                </div>
                                                <div class="display-currency-section">
                                                    <div class="display-currency">
                                                        <label>Display Currency </label>
                                                        <select name="display_currency" id="currencynew">
                                                            <option disabled value="" selected>Select Display Currency</option>
                                                            @foreach($currencies as $currency)
                                                                <option value="{{$currency->id}}">{{$currency->code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="display-currency">
                                                        <label>Transacted Currency</label>
                                                        <select name="transacted_currency">
                                                            <option disabled value="" selected>Select Transacted Currency</option>
                                                            @foreach($currencies as $currency)
                                                                <option value="{{$currency->id}}">{{$currency->symbol.' '.$currency->code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Timezones</label>
                                                    <select name="timezone">
                                                        <option disabled value="" selected>Select Timezone</option>
                                                        @foreach($timeZones as $timeZone)
                                                            <option value="{{$timeZone->id}}">{{$timeZone->text}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-button">
                                                        <button type="submit" class="btn btn-default btn-save">Save</button>
                                                        <button type="button" style="display:none;" class="btn btn-default
                                                        btn-edit">Edit</button>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{$eventId}}" name="event_id">
                                                <input type="hidden" value="" name="time_location_id" class="time-location-id">
                                                <input type="hidden" value="store" name="request_type" class="request-type">
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="location_map" id="location_map">
                                                    <div style="width: 450px; height: 307px;">
                                                        {!! Mapper::render() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="text-right add-another-location" style="display: none;">
                                        <a href="JavaScript:void(0);" onclick="addNewLocationRow(this)" class="addAnother_event_location"><i class="fa fa-plus"></i> Add another Event Location</a>
                                    </div>
                                @endif
                                <div class="ajax-map"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tickets" class="tab-pane fade">
                    <div class="acnt-adrs-innertitle">
                        <h4>What tickets will you offer</h4>
                    </div>
                    <div class="email-preferences all-form">
                        <div class="event-tickets-wrapper">
                            <div class="top-buttons-wrapper">
                                <div class="public_unlisted clearfix">
                                    <a class="unlisted_toogle ticket-link active"  href="javascript:void(0);" >Tickets </a>
                                </div>
                                <div class="offer_tiicket_btn three-offe" id="new-ticket-buttons">
                                    <a href="javascript:void(0)" class="paid_ticket_btn ticketvalue" onclick="addNewTicket(this, 'Paid', '{{$eventId}}')" data-type ="Paid" data-event-id="{{$eventId}}"><i class="fa fa-plus"></i> Paid Ticket</a>
                                    <a href="javascript:void(0)" class="free_ticket_btn ticketvalue" data-type ="Free" data-event-id="{{$eventId}}" onclick="addNewTicket(this, 'Free', '{{$eventId}}')"><i class="fa fa-plus"></i> Free Ticket</a>
                                    <a href="javascript:void(0)" class="donation_btn ticketvalue" data-type="Donation" data-event-id="{{$eventId}}" onclick="addNewTicket(this, 'Donation','{{$eventId}}')"><i class="fa fa-plus"></i> Donation</a>
                                    <input type="hidden" name="ticketvalue" id="ticketvalue">
                                </div>
                            </div>

                            <div class="ticket-listing">
                                <div class="new-tickets">
                                </div>
                                @if(count($tickets))
                                    @foreach($tickets as $ticket)
                                        <div class="ticket-main-wrapper passmain_content">
                                            <div class="ticket-content">
                                                <form method="post" onsubmit="eventTicketForm(event, this)">
                                                    <div class=\"ticket-type\">
                                                        <h4>{{$ticket->type}} Ticket</h4>
                                                    </div>
                                                    <ul class="listTable_row table_row  clearfix">
                                                        <li>
                                                            <input type="hidden" name="type" value="{{$ticket->type}}">
                                                            <label>Ticket Name</label>
                                                            <input type="text" class="form-control" placeholder="e.g General Admission" name="name" value="{{$ticket->name}}">
                                                            <div class="form-error name"></div>
                                                        </li>
                                                        <li>
                                                            <label>Ticket Quantity</label>
                                                            <input type="number" class="form-control qty-a" placeholder="Unlimited" name="quantity" value="{{$ticket->quantity}}">
                                                            <div class="form-error quantity"></div>
                                                        </li>
                                                        <li>
                                                            <label>Ticket Price</label>
                                                            <input type="number" class="form-control" placeholder="Cost" name="price" value="{{$ticket->price}}">
                                                            <div class="form-error price"></div>
                                                        </li>
                                                        <li>
                                                            <ol class="action_list">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="setting-click" onclick="eventTicketSettings(event, this)" title="Ticket Settings"><i class="fa fa-cog"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="copy-click" onclick="copyEventTicket(event, this)" title="Copy Ticket Details"><i class="fa fa-folder-open"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="" onclick="eventTicketPasses(event,this)" title="Ticket Passes"><i class="fa fa-ticket"></i></a>
                                                                </li>

                                                                <li>
                                                                    <button type="submit" class="no-background-border" title="Save Ticket"><i class="fa fa-save"></i></button>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ticket_removerow" title="Delete Ticket" onclick="deleteTicket(event,this)"><i class="fa fa-trash"></i></a>
                                                                </li>
                                                            </ol>
                                                        </li>
                                                    </ul>
                                                    <div class="ticket-settings hidden">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea class="form-control" placeholder="Additional ticket info" name="description">{{$ticket->description}}</textarea>
                                                            <div class="form-error description"></div>
                                                        </div>
                                                        <div class="row datepicker_row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <span>Ticket sale starts</span>
                                                                    <div class="input-group date datepicker1">
                                                                        <span class="input-group-addon">
                                                                          <span class="glyphicon glyphicon-calendar"></span>
                                                                        </span>
                                                                        <input type="text" class="form-control" name="selling_start" value="{{$ticket->selling_start}}"/>
                                                                    </div>
                                                                    <div class="form-error selling_start"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <span>Ticket sale ends</span>
                                                                    <div class="input-group date datepicker2" id="datetimepicker2">
                                                                        <span class="input-group-addon">
                                                                          <span class="glyphicon glyphicon-calendar"></span>
                                                                        </span>
                                                                        <input type="text" class="form-control" name="selling_end" value="{{$ticket->selling_end}}"/>
                                                                    </div>
                                                                    <div class="form-error selling_end"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row newpass_buttons form-group">
                                                            <div class="col-sm-6">
                                                                <span>Ticket status</span>
                                                                <div class="public_unlisted clearfix">
                                                                    <a href="JavaScript:void(0);" id="grp" @if($ticket->status=="active") class="active" @endif
                                                                    onclick="changeTicketStatus(event,this,'active' )">Active</a>
                                                                    <a href="JavaScript:void(0);" id="grp-hidden" @if($ticket->status=="hidden")class="active" @endif
                                                                    onclick="changeTicketStatus(event,this,'hidden')">Hidden</a>
                                                                    <a href="JavaScript:void(0);" id="grp-locked" @if($ticket->status=="locked")class="active" @endif
                                                                    onclick="changeTicketStatus(event,this,'locked')">Locked</a>
                                                                    <input type="hidden" value="{{$ticket->status}}" name="status">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 active-grp-available">
                                                                <span> Available</span>
                                                                <div class="public_unlisted clearfix">
                                                                    <a href="JavaScript:void(0);" id="grp-anywhere" @if($ticket->availability=="anywhere") class="active" @endif
                                                                    onclick="changeTicketAvailability(event,this,'anywhere' )">Anywhere</a>
                                                                    <a href="JavaScript:void(0);" id="grp-online" @if($ticket->availability=="online") class="active" @endif
                                                                    onclick="changeTicketAvailability(event,this,'online' )">Online Only</a>
                                                                    <a href="JavaScript:void(0);" id="grp-door" @if($ticket->availability=="atdoor") class="active" @endif
                                                                    onclick="changeTicketAvailability(event,this,'atdoor' )">At the door</a>
                                                                    <input type="hidden" value="{{$ticket->availability}}" name="availability">
                                                                </div>
                                                            </div>
                                                            <div class="field-group field-group-available hidden">
                                                                <label>Access key</label>
                                                                <div class="field-input status-access-key">
                                                                    <input id="ember2435" class="ember-view ember-text-field form-control rate-access-key-input" placeholder="Enter access key" name="default_access_key" type="text">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row release_ticket_row form-group">
                                                            <div class="col-sm-6">
                                                                <label>Passes per order</label>
                                                                <div class="per_order_minmax">
                                                                    <div class="ordermin">
                                                                        <input type="number" class="form-control" placeholder="Min" name="min_order" value="{{$ticket->min_order}}">
                                                                    </div>
                                                                    <div class="ordermax">
                                                                        <input type="number" class="form-control" placeholder="Max" name="max_order" value="{{$ticket->max_order}}">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="{{$eventId}}" name="event_id">
                                                    <input type="hidden" value="{{$ticket->id}}" name="ticket_id" class="ticket-id">
                                                    <input type="hidden" value="edit" name="request_type" class="request-type">
                                                </form>
                                                <div class="ticket-passes-wrapper hidden">
                                                    @if(count($ticket->passes))
                                                        <div class="event-passes-heading">
                                                            <h4>Ticket Passes<a href="javascript:void(0);" class="add-pass" onclick="addNewTicketPass(event,this,{{$ticket->id}})" title="Connect Pass"><i class="fa fa-plus"></i></a></h4>
                                                        </div>
                                                        <div class="row ticket-pass">
                                                            @foreach($ticket->passes as $pass)
                                                                <div class="col-sm-4">
                                                                    <form onsubmit="updateTicketPass(event,this)" method="post">
                                                                        <div class="pass-details">
                                                                            <div class="pass-name">
                                                                                <label>Pass Name</label>
                                                                                <input type="text" class="form-control" placeholder="Pass Name" name="pass_name" value="{{$pass->name}}">
                                                                            </div>
                                                                            <div class="action_list">
                                                                                <button type="submit" class="no-background-border"><i class="fa fa-save"></i></button>
                                                                                <button type="button" class="no-background-border" title="Delete Pass" onclick="deleteTicketPass(event,this)"><i class="fa fa-trash"></i></button>
                                                                            </div>
                                                                            <input type="hidden" class="pass-id" name="pass_id" value="{{$pass->id}}">
                                                                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}" class="ticket-id">
                                                                            <input type="hidden" class="request-type" name="request_type" value="edit">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <div class="event-passes-heading">
                                                            <h4>Ticket Passes<a href="javascript:void(0);" class="add-pass" onclick="addNewTicketPass(event,this,{{$ticket->id}})" title="Connect Pass"><i class="fa fa-plus"></i></a></h4>
                                                        </div>
                                                        <div class="row ticket-pass">
                                                            <div class="col-md-12 no-passes">
                                                                <p>Currenty there are no passes for this ticket</p>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div id="layouts" class="tab-pane fade">
                    <div class="contc-detail-wrap">
                        <div class="acnt-adrs-innertitle">
                            <h4>Event Layouts and Image Uploading</h4>
                        </div>
                        <div class="shipping-address-inner">
                            <div class="event-layout-listing">
                                <div class="section p-top-10">
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
                                                                    <img src="" id="header-image" class="main-img">
                                                                    <div class="label-content">
                                                                        <div class="browse-icon"></div>
                                                                        Browse<br>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="tooltipContainer">
                                                                <div class="customToolTip">
                                                                    <h1>Photos</h1>
                                                                    <p>Files must be in JPEG, JPG, PNG.
                                                                        <br>
                                                                        Image size must be 600 X 600
                                                                    </p>
                                                                </div>
                                                                <label class="header-img">
                                                                    <input type="file" style="display: none" name="gallery_image[]" onchange="eventImageUpdate(this,'gallery')">
                                                                    <img src="" id="gallery-image-1" class="main-img">
                                                                    <div class="label-content">
                                                                        <div class="browse-icon"></div>
                                                                        Browse<br>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="tooltipContainer">
                                                                <div class="customToolTip">
                                                                    <h1>Photos</h1>
                                                                    <p>Files must be in JPEG, JPG, PNG.
                                                                        <br>
                                                                        Image size must be 600 X 600
                                                                    </p>
                                                                </div>
                                                                <label class="header-img">
                                                                    <input type="file" style="display: none" name="gallery_image[]" onchange="eventImageUpdate(this,'gallery')">
                                                                    <img src="" id="gallery-image-2" class="main-img">
                                                                    <div class="label-content">
                                                                        <div class="browse-icon"></div>
                                                                        Browse<br>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="tooltipContainer">
                                                                <div class="customToolTip">
                                                                    <h1>Photos</h1>
                                                                    <p>Files must be in JPEG, JPG, PNG.
                                                                        <br>
                                                                        Image size must be 600 X 600
                                                                    </p>
                                                                </div>
                                                                <label class="header-img">
                                                                    <input type="file" style="display: none" name="gallery_image[]" onchange="eventImageUpdate(this,'gallery')">
                                                                    <img src="" id="gallery-image-3" class="main-img">
                                                                    <div class="label-content">
                                                                        <div class="browse-icon"></div>
                                                                        Browse<br>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="tooltipContainer">
                                                                <div class="customToolTip">
                                                                    <h1>Photos</h1>
                                                                    <p>Files must be in JPEG, JPG, PNG.
                                                                        <br>
                                                                        Image size must be 600 X 600
                                                                    </p>
                                                                </div>
                                                                <label class="header-img">
                                                                    <input type="file" style="display: none" name="gallery_image[]" onchange="eventImageUpdate(this,'gallery')">
                                                                    <img src="" id="gallery-image-4" class="main-img">
                                                                    <div class="label-content">
                                                                        <div class="browse-icon"></div>
                                                                        Browse<br>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="tooltipContainer">
                                                                <div class="customToolTip">
                                                                    <h1>Photos</h1>
                                                                    <p>Files must be in JPEG, JPG, PNG.
                                                                        <br>
                                                                        Image size must be 600 X 600
                                                                    </p>
                                                                </div>
                                                                <label class="header-img">
                                                                    <input type="file" style="display: none" name="gallery_image[]" onchange="eventImageUpdate(this,'gallery')">
                                                                    <img src="" id="gallery-image-5" class="main-img">
                                                                    <div class="label-content">
                                                                        <div class="browse-icon"></div>
                                                                        Browse<br>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="tooltipContainer">
                                                                <div class="customToolTip">
                                                                    <h1>Photos</h1>
                                                                    <p>Files must be in JPEG, JPG, PNG.
                                                                        <br>
                                                                        Image size must be 600 X 600
                                                                    </p>
                                                                </div>
                                                                <label class="header-img">
                                                                    <input type="file" style="display: none" name="gallery_image[]" onchange="eventImageUpdate(this,'gallery')">
                                                                    <img src="" id="gallery-image-6" class="main-img">
                                                                    <div class="label-content">
                                                                        <div class="browse-icon"></div>
                                                                        Browse<br>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="form-group">
                                                        <div class="applybutton_right">
                                                            <button type="submit" class="btn btn-default btn-save rounded-border">Save</button>
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

