<?php
if (! function_exists('addNewTimeLocationRow')) {
    function addNewTimeLocationRow($currencies, $timeZones, $eventId, $map, $elementId)
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
        $html = "<div class=\"row\" id=\"{$elementId}\">
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
                                <div class=\"form-error start_date\"></div>
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
                                <div class=\"form-error end_date\"></div>
                            </div>
                        </div>
                        <div class=\"col-sm-6\">
                            <div class=\"form-group\">
                                <label>Event location</label>
                                <input type=\"text\" onkeyup=\"searchLocation(event, this)\"
                                       class=\"form-control event_location-serach event_location\" placeholder=\"Enter your event's location\" name=\"event_location\" id=\"event_location_{$elementId}\">
                                <input type=\"hidden\" name=\"latitude\" id=\"event_lat\">
                                <input type=\"hidden\" name=\"longitude\" id=\"event_lng\">
                                <div class=\"form-error event_location\"></div>
                                <div class=\"form-error longitude\"></div>
                                <div class=\"form-error latitude\"></div>
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
                                 <div class=\"form-error timezone\"></div>   
                            </div>
                            <div class=\"form-group\">
                                <div class=\"form-button\">
                                    <button type=\"submit\" class=\"btn btn-default rounded-border btn-save\">Save</button>
                                    <button type=\"button\" style=\"display:none;\" class=\"btn btn-default
                                    btn-edit\">Edit</button>
                                </div>
                            </div>
                            <input type=\"hidden\" value=\"{$eventId}\" name=\"event_id\">
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
                </div>";
        return $html;
    }

    if (! function_exists('addNewTicket')) {
        function addNewTicket($request)
        {
            $html = "<div class=\"ticket-main-wrapper passmain_content\">
                        <div class=\"ticket-type\"><h4>"
                            .title_case($request->type).
                        " Ticket</h4></div>
                        <form method=\"post\" onsubmit=\"eventTicketForm(event, this)\" class=\"form-editable\">
                            <div class=\"ticket-content\">
                                <ul class=\"listTable_row table_row  clearfix\">
                                    <li>
                                        <input type=\"hidden\" name=\"type\" value=\"{$request->type}\">
                                        <label>Ticket Name</label>
                                        <input type=\"text\" class=\"form-control\" placeholder=\"e.g General Admission\" name=\"name\">
                                        <div class=\"form-error name\"></div>
                                    </li>
                                    <li>
                                        <label>Ticket Quantity</label>
                                        <input type=\"number\" class=\"form-control qty-a\" placeholder=\"Unlimited\" name=\"quantity\" >
                                        <div class=\"form-error quantity\"></div>
                                    </li>
                                    <li>
                                        <label>Ticket Price</label>
                                        <input type=\"number\" class=\"form-control\" placeholder=\"Cost\" name=\"price\">
                                        <div class=\"form-error price\"></div>
                                    </li>                                    
                                    <li>                                      
                                        <ol class=\"action_list\">
                                            <li>
                                                <a href=\"javascript:void(0);\" class=\"setting-click\" onclick=\"eventTicketSettings(event, this)\" title=\"Ticket Settings\"><i class=\"fa fa-cog\"></i></a>
                                            </li>
                                            <li>
                                                <a href=\"javascript:void(0);\" class=\"copy-click\" onclick=\"copyEventTicket(event, this)\" title=\"Copy Ticket Details\"><i class=\"fa fa-folder-open\"></i></a>
                                            </li>
                                            <li>
                                                <a href=\"javascript:void(0);\" class=\"\" onclick=\"eventTicketPasses(event,this)\" title=\"Ticket Passes\"><i class=\"fa fa-ticket\"></i></a>
                                            </li>

                                            <li>
                                                <button type=\"submit\" class=\"no-background-border\" title=\"Save Ticket\"><i class=\"fa fa-save\"></i></button>
                                            </li>
                                            <li>
                                                <a href=\"javascript:void(0);\" class=\"ticket_removerow\" title=\"Delete Ticket\" onclick=\"deleteTicket(event,this)\"><i class=\"fa fa-trash\"></i></a>
                                            </li>
                                        </ol>
                                    </li>
                                </ul>
                                <div class=\"ticket-settings hidden\">
                                    <div class=\"form-group\">
                                        <label>Description</label>
                                        <textarea class=\"form-control\" placeholder=\"Additional ticket info\" name=\"description\"></textarea>
                                        <div class=\"form-error description\"></div>
                                    </div>
                                    <div class=\"row datepicker_row\">
                                        <div class=\"col-sm-6\">
                                            <div class=\"form-group\">
                                                <span>Ticket sale starts</span>
                                                <div class=\"input-group date datepicker1\" id=\"datetimepicker1\">
                                                        <span class=\"input-group-addon\">
                                                          <span class=\"glyphicon glyphicon-calendar\"></span>
                                                        </span>
                                                    <input type=\"text\" class=\"form-control\" name=\"selling_start\" />
                                                </div>
                                                <div class=\"form-error selling_start\"></div>
                                            </div>
                                        </div>
                                        <div class=\"col-sm-6\">
                                            <div class=\"form-group\">
                                                <span>Ticket sale ends</span>
                                                <div class=\"input-group date datepicker2\" id=\"datetimepicker2\">
                                                        <span class=\"input-group-addon\">
                                                          <span class=\"glyphicon glyphicon-calendar\"></span>
                                                        </span>
                                                    <input type=\"text\" class=\"form-control\" name=\"selling_end\" />
                                                </div>
                                                <div class=\"form-error selling_end\"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"row newpass_buttons form-group\">
                                        <div class=\"col-sm-6\">
                                            <span>Ticket status</span>
                                            <div class=\"public_unlisted clearfix\">
                                                <a href=\"JavaScript:void(0);\" id=\"grp\" class=\"active \" onclick=\"changeTicketStatus(event,this,'active' )\">Active</a>
                                                <a href=\"JavaScript:void(0);\" id=\"grp-hidden\" class=\"\" onclick=\"changeTicketStatus(event,this,'hidden')\">Hidden</a>
                                                <a href=\"JavaScript:void(0);\" id=\"grp-locked\" class=\"\" onclick=\"changeTicketStatus(event,this,'locked')\">Locked</a>
                                                <input type=\"hidden\" value=\"active \" name=\"status\">
                                            </div>                                      
                                        </div>
                                        <div class=\"col-sm-6 active-grp-available\">
                                            <span> Available</span>
                                            <div class=\"public_unlisted clearfix\">
                                                <a href=\"JavaScript:void(0);\" id=\"grp-anywhere\" class=\" active \" onclick=\"changeTicketAvailability(event,this,'anywhere' )\">Anywhere</a>
                                                <a href=\"JavaScript:void(0);\" id=\"grp-online\" class=\"\" onclick=\"changeTicketAvailability(event,this,'online' )\">Online Only</a>
                                                <a href=\"JavaScript:void(0);\" id=\"grp-door\" class=\"\" onclick=\"changeTicketAvailability(event,this,'atdoor' )\">At the door</a>
                                                <input type=\"hidden\" value=\"anywhere \" name=\"availability\">
                                            </div>
                                        </div>
                                        <div class=\"field-group field-group-available hidden\">
                                            <label>Access key</label>
                                            <div class=\"field-input status-access-key\">
                                                <input id=\"ember2435\" class=\"ember-view ember-text-field form-control rate-access-key-input\" placeholder=\"Enter access key\" name=\"default_access_key\" type=\"text\">
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class=\"row release_ticket_row form-group\">
                                        <div class=\"col-sm-6\">
                                            <label>Passes per order</label>
                                            <div class=\"per_order_minmax\">
                                                <div class=\"ordermin\">
                                                    <input type=\"number\" class=\"form-control\" placeholder=\"Min\" name=\"min_order\">
                                                    <div class=\"form-error min_order\"></div>
                                                </div>
                                                <div class=\"ordermax\">
                                                    <input type=\"number\" class=\"form-control\" placeholder=\"Max\" name=\"max_order\">
                                                    <div class=\"form-error max_order\"></div>
                                                </div>
                                            </div>
            
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class=\"ticket-passes-wrapper hidden\">
                                    <div class=\"event-passes-heading\">
                                        <h4>Ticket Passes</h4>
                                    </div>
                                    <div class=\"row ticket-pass\">
                                        <div class=\"col-md-12 no-passes\">
                                            <p>Currenty there are no passes for this ticket</p>
                                        </div>
                                    </div>                                                                       
                                </div>                               
                            </div>
                            <input type=\"hidden\" value=\"{$request->event_id}\" name=\"event_id\">
                            <input type=\"hidden\" value=\"\" name=\"ticket_id\" class=\"ticket-id\">
                            <input type=\"hidden\" value=\"store\" name=\"request_type\" class=\"request-type\">
                        </form>
                    </div>";
            return $html;
        }
    }

    if (! function_exists('addNewTicketPass')) {
        function addNewTicketPass($request)
        {
            $html = "<div class=\"col-sm-4\">
                        <form onsubmit=\"updateTicketPass(event,this)\" method=\"post\" class=\"form-editable\">
                            <div class=\"pass-details\">
                                <div class=\"pass-name\">
                                    <label>Pass Name</label>
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Pass Name\" name=\"pass_name\">                                    
                                </div>
                                <div class=\"action_list\">
                                    <button type=\"submit\" class=\"no-background-border\"><i class=\"fa fa-save\"></i></button>                                            
                                    <button type=\"button\" class=\"no-background-border\" title=\"Delete Pass\" 
                                    onclick=\"deleteTicketPass(event,this)\"><i class=\"fa fa-trash\"></i></button>                                            
                                </div>
                                <div class=\"form-error pass_name\"></div>
                                <input type=\"hidden\" name=\"pass_id\" value=\"\" class=\"pass-id\">
                                <input type=\"hidden\" name=\"ticket_id\" value=\"{$request->ticket_id}\" class=\"ticket-id\">
                                <input type=\"hidden\" name=\"request_type\" class=\"request-type\" value=\"store\">
                            </div>
                        </form>
                    </div>";
            return $html;
        }
    }

    if (! function_exists('addNewImage')) {
        function addNewImage($request)
        {
            $number = mt_rand();
            $html = "<div class=\"col-md-4\">
                        <div class=\"tooltipContainer\">
                            <div class=\"customToolTip\">
                                <h1>Photos</h1>
                                <p>Files must be in JPEG, JPG, PNG.
                                    <br>
                                    Image size must be 600 X 600
                                </p>
                            </div>
                            <button type=\"button\" class=\"remove-button hidden\" id=\"\" onclick=\"removeEventImage(this, null)\">
                                <i class=\"fa fa-trash\"></i>
                            </button>
                            <label class=\"header-img\">
                                <input type=\"hidden\" name=\"event_id\" id=\"event_id\" value=\"{$request->event_id}\">
                                <input type=\"file\" style=\"display: none\" name=\"gallery_image\" onchange=\"eventImageUpdate(this,'gallery')\">
                                <img src=\"\" id=\"gallery-image-{$number}\" class=\"main-img hidden\">
                                <div class=\"label-content show-block\">
                                    <div class=\"browse-icon\"></div>
                                    Browse<br>
                                </div>
                            </label>
                        </div>
                    </div>";
            return $html;
        }
    }



}
