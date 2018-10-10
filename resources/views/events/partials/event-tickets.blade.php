@if(count($tickets))
    <div class="event-tickets-listing">
        @foreach($tickets as $ticket)
            <div class="tickets_details">
                <h4>{{$ticket->type}} Ticket</h4>
                <button class="btn btn-info" type="button"><i class="fa fa-info-circle"></i></button>
                <ul class="clearfix">
                    <li><strong><i class="fa fa-ticket"></i>Ticket Name</strong></li>
                    <li><span>{{$ticket->name}}</span></li>
                    <li><strong><i class="fa fa-money"></i>Ticket Price</strong></li>
                    <li><span>${{$ticket->price}}</span></li>
                    <li><strong><i class="fa fa-shopping-bag"></i>Tickets Quantity</strong></li>
                    <li><span>{{$ticket->quantity}}</span></li>
                </ul>
                <div class="ticket_description_wrapper">
                    <div class="description_details">
                        <p>{{$ticket->description}}</p>
                    </div>
                    <div class="description_details">
                        <ul class="clearfix">
                            <li><strong>Ticket Sale Starts</strong></li>
                            <li><span>{{$ticket->selling_start}}</span></li>
                            <li><strong>Ticket Sale Ends</strong></li>
                            <li><span>{{$ticket->selling_end}}</span></li>
                        </ul>
                    </div>
                    <div class="description_details">
                        <ul class="clearfix">
                            <li><strong>Ticket Status</strong></li>
                            <li><span>{{ucfirst(trans($ticket->status))}}</span></li>
                        </ul>
                    </div>
                    <div class="description_details">
                        <ul class="clearfix">
                            <li><strong>Ticket Availability</strong></li>
                            <li><span>{{ucfirst(trans($ticket->availability))}}</span></li>
                        </ul>
                    </div>
                    <div class="description_details">
                        <h4>Pass Per Order</h4>
                        <ul class="clearfix">
                            <li><strong>Min</strong></li>
                            <li><span>{{$ticket->min_order}}</span></li>
                            <li><strong>Max</strong></li>
                            <li><span>{{$ticket->max_order}}</span></li>
                        </ul>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endif