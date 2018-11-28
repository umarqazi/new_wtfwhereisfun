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
                        <label>What is your event called? <span class="required-field">*</span></label>
                        <span class="label_cap text-right char_limit">0/75</span>
                        <input type="text" class="form-control" placeholder="Make it a short and
                                        catchy title" name="title" value="{{$event->title}}" id="event_title" required="" maxlength="75">
                        <div class="form-error title"></div>
                    </div>
                    <div class="form-group">
                        <label for="description"> Description <span class="required-field">*</span></label>
                        <span class="label_cap">This description will appear on the event listing page.</span>
                        <textarea class="" id="description" name="description">{{$event->description}}</textarea>
                        <div class="form-error description"></div>
                    </div>
                    <div class="add_contact_referal">
                        <div class="add_contact_detail">
                            @if(empty($event->contact))
                                <a href="JavaScript:void(0);" class="contact_toogle"> <i class="fa fa-plus"></i> Add contact details</a>
                            @endif
                            <div class="contact_append" @if(!empty($event->contact)) style="display:block" @endif>
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
                        <label> Select an Organizer <span class="required-field">*</span></label>
                        <select class="form-control" name="organizer_id" required>
                            <option value="" disabled="" @if(is_null($event->organizer)){{'selected'}}@endif>Select Organizer</option>
                            @foreach($organizers as $organizer)
                                <option @if(!is_null($event->organizer) && $event->organizer_id == $organizer->id){{'selected'}}@endif
                                        value="{{$organizer->id}}">{{$organizer->name}}</option>
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
                            <button type="submit" class="btn btn-default profile-btn rounded-border">Save & Continue</button>
                        </div>
                    </div>
                    <input type="hidden" value="{{$eventId}}" name="event_id">
                </div>
            </form>
        </div>
    </div>
</div>