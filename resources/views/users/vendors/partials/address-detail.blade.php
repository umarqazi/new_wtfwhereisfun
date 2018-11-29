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
                        <input type="checkbox" id="basic_checkbox_1" class="form-control" onchange="isShippingBilling(this)" @if(!empty($shippingAddress) && ($shippingAddress->is_billing_shipping)){{"checked"}}@endif name="is_billing_shipping" value="@if(!empty($shippingAddress) && ($shippingAddress->is_billing_shipping)){{"true"}}@else{{"false"}}@endif">
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