@extends('layouts.master')
@section('title', "Where's the fun :: Account-Settings")
{{-- ______________________ Start Main Content __________________ --}}

<div class="container-fluid profileSideBar">
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="card member-card">
                <div class="header l-green">
                    <h4 class="m-t-10">{{$user->first_name.' '.$user->last_name}}</h4>
                </div>
                <div class="member-img">
                    <form id="profile-image" method="post" enctype="multipart/form-data">
                        <label>
                            <input id="image" style="display: none" type="file" name="thumbnail" accept="image/*" onchange="uploadFile(this)"/>
                            <div class="rounded-circle vendor-profile-image">
                                @if(!empty($user->profile_thumbnail))
                                    @php
                                        $image = $directory['web_path'].$user->profile_thumbnail;
                                        $removeClass = '';
                                    @endphp
                                @else
                                    @php
                                        $image = asset('img/default-148.png');
                                        $removeClass = 'hidden';
                                    @endphp
                                @endif
                                <img src="{{$image}}" alt="profile-image" id="target">
                            </div>
                        </label>
                    </form>
                    <form method="post" action="{{url('remove-image')}}" id="remove-form">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="submit" onclick="return confirm('Are you sure Want to Remove Image ?')" title="Click Here To Remove Image" class="btn btn-raised btn-sm rounded-border {{$removeClass}}">Remove</button>
                    </form>
                </div>

                <div class="body">
                    <div class="col-12">
                        <p class="text-muted">{{$user->email}}</p>
                    </div>
                    <hr>
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#profile">Profile</a></li>
                        <li><a data-toggle="pill" href="#contact">Contact Information</a></li>
                        <li><a data-toggle="pill" href="#address">Address Information</a></li>
                        <li><a data-toggle="pill" href="#email">Email Preferences</a></li>
                        <li><a data-toggle="pill" href="#other">Other Information</a></li>
                        <li><a data-toggle="pill" href="#change-password">Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-sm-8">
            <div class="tab-content">
                <div id="profile" class="tab-pane fade in active">
                    <div class="contc-detail-wrap">
                        <div class="acnt-adrs-innertitle">
                            <h4>Profile</h4>
                        </div>
                        <div class="contc-detail-inner">
                            <form id="profile-information" method="post">
                                <div class="form-group">
                                    <label for="">Prefix</label>
                                    <select class="form-control" id="sel1" name="prefix" required>
                                        <option value="" @if(empty($user->prefix)){{"selected"}}@endif disabled>--</option>
                                        <option value="Dr." @if($user->prefix == 'Dr.'){{"selected"}}@endif> Dr.</option>
                                        <option value="Mr." @if($user->prefix == 'Mr.'){{"selected"}}@endif>Mr.</option>
                                        <option value="Mrs." @if($user->prefix == 'Mrs.'){{"selected"}}@endif>Mrs.</option>
                                        <option value="Ms." @if($user->prefix == 'Ms.'){{"selected"}}@endif>Ms.</option>
                                        <option value="Miss" @if($user->prefix == 'Miss.'){{"selected"}}@endif>Miss</option>
                                        <option value="Mx." @if($user->prefix == 'Mx.'){{"selected"}}@endif>Mx.</option>
                                        <option value="Prof." @if($user->prefix == 'Prof.'){{"selected"}}@endif>Prof.</option>
                                        <option value="Rev." @if($user->prefix == 'Rev.'){{"selected"}}@endif>Rev.</option>
                                    </select>
                                    <div class="form-error prefix"></div>
                                </div>
                                <div class="row name-wrap">
                                    <div class="col-sm-6 form-group">
                                        <label for="">First name</label>
                                        <input class="form-control" maxlength="25" placeholder="First Name" id="first_name" name="first_name" type="text" required value="{{$user->first_name}}">
                                        <div class="form-error first_name"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Last Name</label>
                                        <input class="form-control" id="last_name" maxlength="25" name="last_name" placeholder="Last Name" type="text" required value="{{$user->last_name}}">
                                        <div class="form-error last_name"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Suffix</label>
                                    <input class="form-control" placeholder="Suffix" maxlength="50" id="suffix" name="suffix" type="text"  value="{{$user->suffix}}">
                                    <div class="form-error phone"></div>
                                </div>
                                <div class="row job-title-wrap">
                                    <div class="col-sm-6 form-group">
                                        <label for="">Job Title</label>
                                        <input class="form-control" placeholder="Job Title" id="job_title" maxlength="30" name="job_title" type="text" value="{{$user->job_title}}">
                                        <div class="form-error job_title"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Company / Organization</label>
                                        <input class="form-control" placeholder="Company / Organization" maxlength="50" id="company" name="company" type="text" value="{{$user->company}}">
                                        <div class="form-error company"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="contact" class="tab-pane fade in">
                    <div class="contc-detail-wrap">
                        <div class="acnt-adrs-innertitle">
                            <h4>Contact Information</h4>
                        </div>
                        <div class="contc-detail-inner">
                            <form id="contact-information" method="post">
                                <div class="row tele-no-wrap">
                                    <div class="col-sm-6 form-group">
                                        <label for="">Home Phone</label>
                                        <input class="form-control" maxlength="15" minlength="10" placeholder="Home Phone" id="home_phone" name="phone" type="text" required type="text" value="{{ $user->phone}}">
                                        <div class="form-error phone"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Cell Phone</label>
                                        <input class="form-control" maxlength="15" minlength="10" placeholder="Cell Phone" id="cell_phone" name="mobile" type="text" required value="{{ $user->mobile}}">
                                        <div class="form-error mobile"></div>
                                    </div>
                                </div>
                                <div class="row job-title-wrap">
                                    <div class="col-sm-6 form-group">
                                        <label for="">Website</label>
                                        <input class="form-control" placeholder="Website" id="website" maxlength="40" name="website" type="text" value="{{$user->website}}">
                                        <div class="form-error website"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Blog</label>
                                        <input class="form-control" maxlength="50" placeholder="Blog" id="blog" name="blog" type="text" value="{{$user->blog}}">
                                        <div class="form-error blog"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="address" class="tab-pane fade">
                    <form id="address-information" method="post">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Shipping Address</h4>
                            </div>
                            <div class="shipping-address-inner">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input class="form-control" placeholder="Address" id="" name="shipping_address" type="text" maxlength="200" value="@if(!empty($shippingAddress->address)){{$shippingAddress->address}}@endif">
                                    <div class="form-error shipping_address"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control change-country" main="shipping" id="shipping-country" onchange="getStates(this)" name="shipping_country" required>
                                        <option value="" @if(empty($shippingAddress->city_id)){{"selected"}}@endif disabled>Select a Counrty</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id}}" @if(!empty ($shippingAddress->city) && ($country->id == $shippingAddress->city->state->country->id)){{"selected"}}@endif>{{ $country->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-error shipping_country"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">State</label>
                                    <select class="form-control change-state states" main="shipping" onchange="getCities(this)" id="shipping-state"
                                            name="shipping_state" @if(empty($shippingAddress->city)){{"disabled"}}@endif required>
                                        <option value="" @if(empty($shippingAddress->city_id)){{"selected"}}@endif disabled>Select a State</option>
                                        @if(!empty($shippingAddress->city) && count($shippingStates))
                                            @foreach($shippingStates as $state)
                                                <option value="{{$state->id}}" @if($state->id == $shippingAddress->city->state->id)
                                                    {{"selected"}}@endif>{{$state->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="form-error shipping_state"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">City</label>
                                    <select class="form-control change-city cities" main="shipping"
                                            id="shipping-city" name="shipping_city" @if(empty($shippingAddress->city)){{"disabled"}}@endif required>
                                        <option value="" @if(empty($shippingAddress->city_id)){{"selected"}}@endif disabled>Select a City</option>
                                        @if(!empty($shippingAddress->city) && count($shippingCities))
                                            @foreach($shippingCities as $city)
                                                <option value="{{$city->id}}" @if(!empty($shippingAddress->city) && ($city->id == $shippingAddress->city->id))
                                                    {{"selected"}}@endif>{{$city->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="form-error shipping_city"></div>
                                </div>

                                <div class="row name-wrap">
                                    <div class="form-group" style="margin-left: 13px">
                                        <label for="">Zip/Postal Code</label>
                                        <input style="width: 98%" class="form-control" placeholder="Zip/Postal" maxlength="10" id="" name="shipping_zipcode" type="text" value="@if(!empty($shippingAddress->zip_code)){{$shippingAddress->zip_code}}@endif">
                                        <div class="form-error shipping_zipcode"></div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <input type="checkbox" id="basic_checkbox_1" class="form-control" onchange="isShippingBilling(this)" @if(!empty($shippingAddress) && ($shippingAddress->is_billing_shipping)){{"checked"}}@endif name="is_billing_shipping" value="true">
                                        <label for="basic_checkbox_1">Billing Same as Shipping</label>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="billing-address-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Billing Address</h4>
                            </div>
                            <div class="billing-address-inner">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input class="form-control" placeholder="Address" id="" name="billing_address" type="text" maxlength="200" value="@if(!empty($billingAddress->address)){{$billingAddress->address}}@endif">
                                    <div class="form-error billing_address"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control change-country" onchange="getStates(this)" main="billing" id="billing-country" name="billing_country">
                                        <option value="" @if(empty($billingAddress->city_id)){{"selected"}}@endif disabled>Select a Counrty</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id}}" @if(!empty ($billingAddress->city) && ($country->id == $billingAddress->city->state->country->id)){{"selected"}}@endif>{{ $country->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-error billing_country"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">State</label>
                                    <select class="form-control change-state states" onchange="getCities
                                                    (this)" main="billing" id="billing-state" name="billing_state" @if(empty($billingAddress->city)){{"disabled"}}@endif >
                                        <option value="" @if(empty($billingAddress->city_id)){{"selected"}}@endif disabled>Select a State</option>
                                        @if(!empty($billingAddress->city) && count($billingStates))
                                            @foreach($billingStates as $state)
                                                <option value="{{$state->id}}" @if($state->id == $billingAddress->city->state->id)
                                                    {{"selected"}}@endif>{{$state->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="form-error billing_state"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">City</label>
                                    <select class="form-control change-city cities" main="billing"
                                            id="billing-city" name="billing_city" @if(empty($billingAddress->city)){{"disabled"}}@endif >
                                        <option value="" @if(empty($billingAddress->city_id)){{"selected"}}@endif disabled>Select a City</option>
                                        @if(!empty($billingAddress->city) && count($billingCities))
                                            @foreach($billingCities as $city)
                                                <option value="{{$city->id}}" @if(!empty($billingAddress->city) && ($city->id == $billingAddress->city->id))
                                                    {{"selected"}}@endif>{{$city->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="form-error billing_city"></div>
                                </div>

                                <div class="row name-wrap">
                                    <div class="form-group" style="margin-left: 13px">
                                        <label for="">Zip/Postal Code</label>
                                        <input style="width: 98%" class="form-control" placeholder="Zip/Postal" maxlength="10" id="" name="billing_zipcode" type="text" value="@if(!empty($billingAddress->zip_code)){{$billingAddress->zip_code}}@endif">
                                        <div class="form-error billing_zipcode"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="show_billing" name="show_billing" value="@if(!empty($shippingAddress) &&
                        ($shippingAddress->is_billing_shipping)){{$shippingAddress->is_billing_shipping}}@else{{0}}@endif">
                        <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
                    </form>
                </div>

                <div id="email" class="tab-pane fade">
                    <div class="acnt-adrs-innertitle">
                        <h4>Email Preferences</h4>
                    </div>
                    <div class="email-preferences all-form">
                        <form method="post" id="email-preferences">
                            <div class="email-preferences-inner">
                                @if($user->hasRole('vendor'))
                                <div class="attending-events-wrap">
                                    <div class="acnt-adrs-innertitle">
                                        <h3>Attending Events</h3>
                                    </div>
                                    <p class="email-preferences-subtitle">News and updates about events created by event organizers</p>
                                    <div class="attng-evnt-eml-wrap">
                                        <div class="acnt-adrs-innersubtitle"><p>Email me</p></div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_2" class="form-control" @if(!is_null($emailPreference) && $emailPreference->update_new_feature){{"checked"}}@endif  name="update_new_feature" value="1">
                                            <label for="basic_checkbox_2">Updates about new WTF WHERE’S THE FUN features and announcements</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_3" class="form-control" @if(!is_null($emailPreference) && $emailPreference->weekly_event_guide){{"checked"}}@endif  name="weekly_event_guide" value="1">
                                            <label for="basic_checkbox_3">WTF WHERE’S THE FUN weekly event guide: A digest of personalized
                                                event recommendations</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_4" class="form-control" @if(!is_null($emailPreference) && $emailPreference->additional_info){{"checked"}}@endif  name="additional_info" value="1">
                                            <label for="basic_checkbox_4">Requests for additional information on an event after you have
                                                attended</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_5" class="form-control" @if(!is_null($emailPreference) && $emailPreference->updates_for_attendees){{"checked"}}@endif  name="updates_for_attendees" value="1">
                                            <label for="basic_checkbox_5">Unsubscribe from all WTF WHERE’S THE FUN
                                                newsletters and updates for attendees</label>
                                        </div>
                                    </div>
                                    <div class="attending-events-ntfcn">
                                        <div class="acnt-adrs-innersubtitle"><p>Notifications</p></div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_6" class="form-control" @if(!is_null($emailPreference) && $emailPreference->buy_ticket){{"checked"}}@endif  name="buy_ticket" value="1">
                                            <label for="basic_checkbox_6">When friends buy tickets or register for events near me</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="organizing-events-wrap">
                                    <div class="acnt-adrs-innertitle">
                                        <h3>Organizing Events</h3>
                                    </div>
                                    <p class="organizing-events-subtitle">Helpful updates and tips for organizing events on WTF WHERE’S THE FUN </p>
                                    <div class="org-evnt-eml-wrap">
                                        <div class="acnt-adrs-innersubtitle"><p>Email me</p></div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_7" class="form-control" @if(!is_null($emailPreference) && $emailPreference->organizing_update_new_feature){{"checked"}}@endif  name="organizing_update_new_feature" value="1">
                                            <label for="basic_checkbox_7">Updates about new WTF WHERE’S THE FUN features and
                                                announcements</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_8" class="form-control" @if(!is_null($emailPreference) && $emailPreference->event_sales_recap){{"checked"}}@endif  name="event_sales_recap" value="1">
                                            <label for="basic_checkbox_8">Event Sales Recap</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_9" class="form-control" @if(!is_null($emailPreference) && $emailPreference->updates_for_event_organizers){{"checked"}}@endif  name="updates_for_event_organizers" value="1">
                                            <label for="basic_checkbox_9">Unsubscribe from all WTF WHERE’S THE FUN newsletters and updates
                                                for event organizing-events-wrap</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_10" class="form-control" @if(!is_null($emailPreference) && $emailPreference->updates_for_event_attendees){{"checked"}}@endif  name="updates_for_event_attendees" value="1">
                                            <label for="basic_checkbox_10">Unsubscribe from all WTF WHERE’S THE FUN newsletters and updates
                                                for attendees</label>
                                        </div>
                                    </div>
                                    <div class="org-evnt-ntfcn">
                                        <div class="acnt-adrs-innersubtitle"><p>Notifications</p></div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_11" class="form-control" @if(!is_null($emailPreference) && $emailPreference->important_reminders){{"checked"}}@endif  name="important_reminders" value="1">
                                            <label for="basic_checkbox_11">Important reminders for my next event</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="basic_checkbox_12" class="form-control" @if(!is_null($emailPreference) && $emailPreference->order_confirmation){{"checked"}}@endif  name="order_confirmation" value="1">
                                            <label for="basic_checkbox_12">Order confirmations from my attendees</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="acnt-erefernce-btn">
                                <button type="submit" class="btn btn-default email-preferences-btn rounded-border">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="other" class="tab-pane fade">
                    <div class="contc-detail-wrap">
                        <div class="acnt-adrs-innertitle">
                            <h4>Other Information</h4>
                        </div>
                        <div class="other-information-inner">
                            <form id="other-information">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select class="form-control" id="sel1" name="gender" required="">
                                        <option value="" @if(empty($user->gender)){{"selected"}}@endif disabled>Select Gender</option>
                                        <option value="male" @if(!empty($user->gender) && $user->gender == 'male') {{"selected"}}@endif>Male</option>
                                        <option value="female" @if(!empty($user->gender) && $user->gender == 'female') {{"selected"}}@endif>Female</option>
                                        <option value="other" @if(!empty($user->gender) && $user->gender == 'other'){{"selected"}}@endif>Other</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                                            <strong class="manadatory">{{ $errors->first('gender') }}</strong>
                                                        </span>
                                    @endif
                                    <div class="form-error gender"></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label for="">Month</label>
                                        <select class="form-control" id="sel1" name="birth_month" required>
                                            <option value="" @if(empty($user->birth_month)){{"selected"}}@endif disabled>Select Month</option>
                                            @foreach(getMonths() as $month)
                                                <option value="{{$month}}" @if($month == $user->birth_month){{"selected"}}@endif>{{$month}}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-error birth_month"></div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="">Day</label>
                                        <select class="form-control" id="sel1" name="birth_date" required>
                                            <option value="" @if(empty($user->birth_date)){{"selected"}}@endif disabled>Select Day</option>
                                            @for($i=1; $i < 32; $i++) { ?>
                                            <option value="{{$i}}" @if($i == $user->birth_date){{"selected"}}@endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                        <div class="form-error birth_date"></div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="">Year</label>
                                        <select class="form-control" id="sel1" name="birth_year" required>
                                            <option value="" @if(empty($user->birth_year)){{"selected"}}@endif disabled>Select Year</option>
                                            @for($j=date('Y'); $j > 1900; $j--)
                                                <option value="{{$j}}" @if($j == $user->birth_year){{"selected"}}@endif>{{$j}}</option>
                                            @endfor
                                        </select>
                                        <div class="form-error birth_year"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Age</label>
                                    <input class="form-control" placeholder="Age" id="age" name="age" min="1" type="number"  required value="{{$user->age}}">
                                    <div class="form-error age"></div>
                                </div>
                                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="change-password" class="tab-pane fade">
                    <div class="contc-detail-wrap">
                        <div class="acnt-adrs-innertitle">
                            <h4>Change Password</h4>
                        </div>
                        <div class="other-information-inner">
                            <form id="password-change" method="post">
                                <div class="form-group">
                                    <label for="usr">Current Password</label>
                                    <input type="password" placeholder="Current Password" required name="current_password" class="form-control prevent-copy-paste">
                                    <div class="form-error current_password"></div>
                                </div>
                                <div class="form-group">
                                    <label for="usr">New Password</label>
                                    <input type="password" placeholder="New Password" required name="password" class="form-control prevent-copy-paste">
                                    <div class="form-error password"></div>
                                </div>
                                <div class="form-group">
                                    <label for="usr">Confirm Password</label>
                                    <input type="password" placeholder="Confirm Password" required name="password_confirmation" class="form-control prevent-copy-paste">
                                    <div class="form-error password_confirmation"></div>
                                </div>
                                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
