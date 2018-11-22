<div id="tickets" class="tab-pane fade">
    <div class="acnt-adrs-innertitle">
        <h4>What tickets will you offer</h4>
    </div>
    <div class="email-preferences all-form">
        <div class="event-tickets-wrapper">
            <div class="top-buttons-wrapper">
                <div class="public_unlisted_tickets clearfix">
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
                                    <div class="ticket-type">
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
                                    <ul class="listTable_row table_row  clearfix">
                                        <li>
                                            <label>Ticket Time & Location</label>
                                            <select class="form-control" name="time_location_id">
                                                <option value="" @if(is_null($ticket->time_location)){{'selected'}}@endif disabled>Select Time & Location</option>
                                                @foreach($locations as $location)
                                                    <option value="{{$location->id}}"
                                                        @if($ticket->time_location_id == $location->id){{'selected'}}@endif>{{str_limit($location->location, 30). ' '.monthDateYearFromat($location->starting)}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="form-error time_location_id"></div>
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
                                                        <div class="form-error min_order"></div>
                                                    </div>
                                                    <div class="ordermax">
                                                        <input type="number" class="form-control" placeholder="Max" name="max_order" value="{{$ticket->max_order}}">
                                                        <div class="form-error max_order"></div>
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
                                                            <div class="form-error pass_name"></div>
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
                <div class="">
                    <button type="button" class="btn rounded-border" onclick="nextTab()">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>