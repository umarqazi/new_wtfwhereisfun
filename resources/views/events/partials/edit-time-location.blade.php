<div id="locations" class="tab-pane fade">
    <div class="contc-detail-wrap">
        <div class="acnt-adrs-innertitle">
            <h4>When and where is your event? <a class="pull-right" href="JavaScript:void(0);" onclick="addNewLocationRow(this,'{{$eventId}}')"><i class="fa fa-plus"></i> Add Another Location</a></h4>
        </div>
        <div class="shipping-address-inner">
            <div class="time-location-rows">
                @php $countLocations = count($locations); @endphp
                @if($countLocations > 0)
                    @foreach($locations as $key => $location)
                        <div class="row" id="{{$countLocations - $key}}">
                            <form method="get" onsubmit="eventLocationForm(event, this)" id="event-form-{{$location->id}}">
                                <div class="col-sm-6 datepicker_row" id="datetime_area">
                                    <div class="form-group">
                                        <label>Event Start Date <span class="required-field">*</span></label>
                                        <div class="input-group datetimepicker1" id="datetimepicker1">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            <input type="text" class="form-control" value="{{$location->starting->format('Y-m-d g:i A')}}" name="event_start_date" />
                                        </div>
                                        <div class="form-error event_start_date"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6 datepicker_row" id="datetime_area">
                                    <div class="form-group">
                                        <label>Event End Date <span class="required-field">*</span></label>
                                        <div class="input-group datetimepicker1" id="datetimepicker1">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                            <input type="text" class="form-control" value="{{$location->ending->format('Y-m-d g:i A')}}" name="event_end_date" />
                                        </div>
                                        <div class="form-error event_end_date"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Event location <span class="required-field">*</span></label>
                                        <input type="text" class="form-control event_location-serach" value="{{$location->location}}" placeholder="Enter your event's location" name="event_location" id="event_location_{{$countLocations - $key}}" onkeyup="searchLocation(event, this)" >
                                        <input type="hidden" name="latitude" id="event_lat" value="{{$location->longitude}}">
                                        <input type="hidden" name="longitude" id="event_lng" value="{{$location->longitude}}">
                                        <div class="form-error event_location"></div>
                                        <div class="form-error latitude"></div>
                                        <div class="form-error longitude"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address <span class="required-field">*</span></label>
                                        <input type="text" class="form-control event_location-serach" id="event_address" placeholder="Enter your event's address" value="{{$location->address}}" name="event_address">
                                    </div>
                                    <div class="display-currency-section">
                                        <div class="display-currency">
                                            <label>Display Currency </label>
                                            <select name="display_currency" >
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
                                            <select name="transacted_currency" >
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
                                        <label>Timezones <span class="required-field">*</span></label>
                                        <select name="timezone" >
                                            <option disabled value="" @if(is_null($location->timezone)){{"selected"}}@endif>Select Timezone</option>
                                            @foreach($timeZones as $timeZone)
                                                <option value="{{$timeZone->id}}"
                                                @if(!is_null($location->timezone) && $timeZone->id == $location->timezone_id){{'selected'}}@endif>{{$timeZone->text}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="form-error timezone"></div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default btn-save rounded-border">Save</button>
                                        @if($countLocations - $key == 1)
                                            <button type="button" class="btn rounded-border" onclick="nextTab()">Continue</button>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="location_map" id="location_map">
                                        <div style="width: 450px; height: 300px;">
                                            {!! Mapper::render($key) !!}
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$eventId}}" name="event_id">
                                <input type="hidden" value="{{$location->id}}" name="time_location_id">
                                <input type="hidden" value="update" name="request_type">
                            </form>
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <form type="post" onsubmit="eventLocationForm(event, this)" id="event-save-location">
                            <div class="col-sm-6 datepicker_row" id="datetime_area">
                                <div class="form-group">
                                    <label>Event Start Date <span class="required-field">*</span></label>
                                    <div class="input-group datetimepicker1" id="datetimepicker1">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <input autocomplete="off" type="text" class="form-control" name="event_start_date" id="start_date"/>
                                    </div>
                                    <div class="form-error event_start_date"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 datepicker_row" id="datetime_area">
                                <div class="form-group">
                                    <label>Event End Date <span class="required-field">*</span></label>
                                    <div class="input-group datetimepicker1" id="datetimepicker2">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <input autocomplete="off" type="text" class="form-control" name="event_end_date"/>
                                    </div>
                                    <div class="form-error event_end_date"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Event location <span class="required-field">*</span></label>
                                    <input type="text" onkeyup="searchLocation(event, this)" class="form-control event_location-serach event_location" placeholder="Enter your event's location" name="event_location" id="event_location">
                                    <input type="hidden" name="latitude" id="event_lat">
                                    <input type="hidden" name="longitude" id="event_lng">
                                    <div class="form-error event_location"></div>
                                    <div class="form-error latitude"></div>
                                    <div class="form-error longitude"></div>
                                </div>
                                <div class="form-group">
                                    <label>Address <span class="required-field">*</span></label>
                                    <input type="text" id="event_address" class="form-control event_address event_location-serach" placeholder="Enter your event's address" name="event_address">
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
                                    <label>Timezones <span class="required-field">*</span></label>
                                    <select name="timezone">
                                        <option disabled value="" selected>Select Timezone</option>
                                        @foreach($timeZones as $timeZone)
                                            <option value="{{$timeZone->id}}">{{$timeZone->text}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-error timezone"></div>
                                </div>
                                <div class="form-group">
                                    <div class="form-button">
                                        <button type="submit" class="btn btn-default btn-save rounded-border">Save</button>
                                        <button type="button" class="btn rounded-border" onclick="nextTab()">Continue</button>
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
                @endif
                <div class="ajax-map"></div>
            </div>
        </div>
    </div>
</div>