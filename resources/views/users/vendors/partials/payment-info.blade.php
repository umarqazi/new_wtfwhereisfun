<div id="payment-info" class="tab-pane fade">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>Payment Information</h4>
        </div>
        <div class="other-information-inner">
            <form id="user-payment-info" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="usr">Email</label>
                    <input type="email" placeholder="Email" required name="payment_email" class="form-control prevent-copy-paste" @if(!empty($user->payment_email)) value="{{$user->payment_email}}" @endif>
                    <div class="form-error payment_email"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Confirm Email</label>
                    <input type="email" placeholder="Confirm Email" required name="confirm_payment_email" class="form-control prevent-copy-paste" @if(!empty($user->payment_email)) value="{{$user->payment_email}}" @endif>
                    <div class="form-error confirm_payment_email"></div>
                </div>

                <div class="form-group">
                    <label for="usr">Account Holder Information</label>
                    <br>
                    <input name="account_holder" type="radio" id="radio_6" class="with-gap" value="individual" required @if(!empty($user->account_holder == 'individual')) checked @endif>
                    <label for="radio_6">Individual</label>

                    <input name="account_holder" type="radio" id="radio_7" class="with-gap" value="company" required @if(!empty($user->account_holder == 'company')) checked @endif>
                    <label for="radio_7">Company</label>

                    <div class="form-error account_holder"></div>
                </div>

                <div class="form-group">
                    <label for="usr">Account Type</label>
                    <br>
                    <input name="account_type" type="radio" id="radio_8" class="with-gap" value="checking" required @if(!empty($user->account_type == 'checking')) checked @endif>
                    <label for="radio_8">Checking</label>

                    <input name="account_type" type="radio" id="radio_9" class="with-gap" value="saving" required @if(!empty($user->account_type == 'saving')) checked @endif>
                    <label for="radio_9">Saving</label>

                    <div class="form-error account_type"></div>
                </div>

                <div class="form-group display-currency payment-field">
                    <label>Transacted Currency</label>
                    <select name="bank_currency" required>
                        <option value="" @if(empty($user->bank_currency)){{"selected"}}@endif disabled>Select Transacted Currency</option>
                        @foreach($currencies as $currency)
                            <option value="{{$currency->id}}"
                                @if(!is_null($user->bank_currency) && $currency->id ==  $user->bank_currency){{'selected'}}@endif>{{$currency->symbol.' '.$currency->code}}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-error bank_currency"></div>
                </div>

                <div class="form-group">
                    <label for="usr">Bank Name</label>
                    <input type="name" placeholder="Bank Name" required name="bank_name" class="form-control prevent-copy-paste" @if(!empty($user->bank_name)) value="{{$user->bank_name}}" @endif>
                    <div class="form-error bank_name"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Account Title</label>
                    <input type="name" placeholder="Account Title" required name="account_title" class="form-control prevent-copy-paste" @if(!empty($user->account_title)) value="{{$user->account_title}}" @endif>
                    <div class="form-error account_title"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Account Number</label>
                    <input type="name" placeholder="Account Number" required name="account_number" class="form-control prevent-copy-paste" @if(!empty($user->account_number)) value="{{$user->account_number}}" @endif>
                    <div class="form-error account_number"></div>
                </div>
                <div class="form-group">
                    <label for="usr">Routing Number</label>
                    <input type="name" placeholder="Routing Number" required name="routing_number" class="form-control prevent-copy-paste" @if(!empty($user->routing_number)) value="{{$user->routing_number}}" @endif>
                    <div class="form-error routing_number"></div>
                </div>

                <div class="shipping-address-inner">
                    <div class="form-group">
                        <label for="">Bank Address</label>
                        <input class="form-control" placeholder="Address" id="" name="bank_address" type="text" required maxlength="200" value="@if(!empty($user->bank_address)){{$user->bank_address}}@endif">
                        <div class="form-error bank_address"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Country</label>
                        <select class="form-control change-country" main="shipping" id="shipping-country" onchange="getStates(this)" name="bank_country" required>
                            <option value=""
                                    @if(empty($user->bank_city))

                                        {{"selected"}}
                                    @endif disabled>
                                Select a Country
                            </option>
                            @foreach($countries as $country)

                                <option value="{{ $country->id}}"
                                    @if(!empty ($user->bank_city) && ($country->id == $user->b_city->state->country->id))

                                        {{"selected"}}
                                    @endif>
                                    {{ $country->name}}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-error bank_country"></div>
                    </div>
                    <div class="form-group">
                        <label for="">State</label>
                        <select class="form-control change-state states" main="shipping" onchange="getCities(this)" id="shipping-state"
                                name="bank_state" @if(empty($user->bank_city)){{"disabled"}}@endif required>
                            <option value=""
                                    @if(empty($user->bank_city))

                                        {{"selected"}}
                                    @endif disabled>
                                Select a State
                            </option>
                            @if(!empty($user->bank_city))
                                @foreach($states as $state)
                                    <option value="{{$state->id}}"
                                        @if(!empty($user->bank_city) && $state->id == $user->b_city->state->id)

                                            {{"selected"}}
                                        @endif>

                                        {{$state->name}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        <div class="form-error bank_state"></div>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <select class="form-control change-city cities" main="shipping"
                                id="shipping-city" name="bank_city" @if(empty($user->bank_city)){{"disabled"}}@endif required>
                            <option value="" @if(empty($user->bank_city)){{"selected"}}@endif disabled>Select a City</option>
                            @if(!empty($user->bank_city))

                                @foreach($cities as $city)

                                    <option value="{{$city->id}}"
                                        @if(!empty($user->bank_city) && ($city->id == $user->bank_city))

                                            {{"selected"}}
                                        @endif>
                                        {{$city->name}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        <div class="form-error bank_city"></div>
                    </div>

                    <div class="row name-wrap">
                        <div class="form-group" style="margin-left: 13px">
                            <label for="">Zip/Postal Code</label>
                            <input style="width: 98.5%" class="form-control" placeholder="Zip/Postal" maxlength="10" required id="" name="bank_zipcode" type="text" value="@if(!empty($user->bank_zip_code)){{$user->bank_zip_code}}@endif">
                            <div class="form-error bank_zipcode"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="usr">Select Payment Method</label>
                    <br>
                    <input name="payment_method" type="radio" id="radio_4" class="with-gap" value="paypal" required @if(!empty($user->payment_method == 'paypal')) checked @endif>
                    <label for="radio_4"><i class="fab fa-cc-paypal payment-card"></i></label>

                    <input name="payment_method" type="radio" id="radio_5" class="with-gap" value="stripe" required @if(!empty($user->payment_method == 'stripe')) checked @endif>
                    <label for="radio_5"><i class="fab fa-cc-stripe payment-card stripe-icon"></i></label>

                    <div class="form-error payment_method"></div>
                </div>
                <button type="submit" class="btn btn-default profile-btn rounded-border">Save</button>
            </form>
        </div>
    </div>
</div>