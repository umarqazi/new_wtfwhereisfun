<?php
if (! function_exists('addNewTimeLocationRow')) {
    function addNewTimeLocationRow($currencies, $timeZones, $eventId, $map)
    {
        $displayCurrencyOptions = '';
        $transactedCurrencyOptions = '';
        $timeZonesOptions = '';
        foreach($currencies as $currency){
            $displayCurrencyOptions .= "<option value='$currency->id'>$currency->code</option>";
        }
        foreach($currencies as $currency){
            $transactedCurrencyOptions .= "<option value='$currency->id'>$currency->symbol".' '."$currency->code</option>";
        }
        foreach($timeZones as $timeZone){
            $timeZonesOptions .= "<option value='$timeZone->id'>$timeZone->text</option>";
        }
        $html = "<div class=\"row\">
                    <form type=\"post\" onsubmit=\"eventLocationForm(event, this)\" id=\"event-save-location\">
                        <div class=\"col-sm-6 datepicker_row\" id=\"datetime_area\">
                            <div class=\"form-group\">
                                <label>Event Start Date</label>
                                <div class=\"input-group date datepicker1\" id=\"datetimepicker1\">
                                    <span class=\"input-group-addon\">
                                        <span class=\"glyphicon glyphicon-calendar\"></span>
                                    </span>
                                    <input autocomplete=\"off\" type=\"text\" class=\"form-control datepic\" name=\"event_start_date\" id=\"start_date\"/>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-sm-6 datepicker_row\" id=\"datetime_area\">
                            <div class=\"form-group\">
                                <label>Event End Date</label>
                                <div class=\"input-group date datepicker2\" id=\"datetimepicker2\">
                                    <span class=\"input-group-addon\">
                                        <span class=\"glyphicon glyphicon-calendar\"></span>
                                    </span>
                                    <input autocomplete=\"off\" type=\"text\" class=\"form-control\" name=\"event_end_date\" id=\"end_date\"/>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-sm-6\">
                            <div class=\"form-group\">
                                <label>Event location</label>
                                <input type=\"text\" onkeyup=\"searchLocation(event, this)\"
                                       class=\"form-control event_location-serach event_location\" placeholder=\"Enter your event's location\" name=\"event_location\" id=\"event_location\">
                                <input type=\"hidden\" name=\"latitude\" id=\"event_lat\">
                                <input type=\"hidden\" name=\"longitude\" id=\"event_lng\">
                                <div class=\"form-error event_location\"></div>
                            </div>
                            <div class=\"form-group\">
                                <label>Address </label>
                                <input type=\"text\" class=\"form-control event_address event_location-serach\" placeholder=\"Enter your event's address\" name=\"event_address\" id=\"event_address\">
                                <div class=\"form-error event_address\"></div>
                            </div>
                            <div class=\"display-currency-section\">
                                <div class=\"display-currency\">
                                    <label>Display Currency </label>
                                    <select name=\"display_currency\" id=\"currencynew\">
                                        <option disabled value=\"\" selected>Select Display Currency</option>"
                                        .$displayCurrencyOptions.
                                    "</select>
                                </div>
                                <div class=\"display-currency\">
                                    <label>Transacted Currency</label>
                                    <select name=\"transacted_currency\">
                                        <option disabled value=\"\" selected>Select Transacted Currency</option>"
                                            .$transactedCurrencyOptions.
                                    "</select>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label>Timezones</label>
                                <select name=\"timezone\">
                                    <option disabled value=\"\" selected>Select Timezone</option>"
                                    .$timeZonesOptions.
                                "</select>
                            </div>
                            <div class=\"form-group\">
                                <div class=\"form-button\">
                                    <button type=\"submit\" class=\"btn btn-default btn-save\">Save</button>
                                    <button type=\"button\" style=\"display:none;\" class=\"btn btn-default
                                    btn-edit\">Edit</button>
                                </div>
                            </div>
                            <input type=\"hidden\" value=\"{{$eventId}}\" name=\"event_id\">
                            <input type=\"hidden\" value=\"\" name=\"time_location_id\" class=\"time-location-id\">
                            <input type=\"hidden\" value=\"store\" name=\"request_type\" class=\"request-type\">
                        </div>
                        <div class=\"col-sm-6\">
                            <div class=\"location_map\" id=\"location_map\">
                                <div style=\"width: 450px; height: 307px;\">".
                                    $map
                                ."</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class=\"text-right add-another-location\" style=\"display: none;\">
                    <a href=\"JavaScript:void(0);\" onclick=\"addNewLocationRow()\" class=\"addAnother_event_location\"><i class=\"fa fa-plus\"></i> Add another Event Location</a>
                </div>";
        return $html;
    }
}