@if(count($tickets))
    <div class="event-tickets-listing">

        <div class="tickets_details">

            <div class="clearfix"></div>
            <div class="table-responsive tickets-table">
                <table class="table">
                    <tr>
                        <td class="text-center"><strong><i class="fa fa-ticket"></i><br>Ticket Name</strong></td>
                        <td class="text-center"><strong><i class="fa fa-money"></i><br>Ticket Price</strong></td>
                        <td class="text-center"><strong><i class="fa fa-ticket"></i><br>Tickets Type</strong></td>
                        @if($tickets[0]->time_location->hot_deal()->exists())
                            <td class="text-center"><strong><i class="fa fa-ticket"></i><br>Discount</strong></td>
                        @endif
                        {{--<td class="text-center"><strong><i class="fa fa-info-circle"></i><br>Details</strong></td>--}}
                        <td class="text-center"><strong><i class="fa fa-shopping-cart"></i><br>Cart</strong></td>
                    </tr>
                    @foreach($tickets as $ticket)
                        <tr class="ticket-details">
                            <td class="text-center"><span>{{$ticket->name}}</span></td>
                            <td class="text-center"><span>${{$ticket->price}}</span></td>
                            <td class="text-center"><span>{{$ticket->type}}</span></td>
                            @if($ticket->time_location->hot_deal()->exists())
                                <td class="text-center">
                                    {{$ticket->time_location->hot_deal->discount}}%
                                </td>
                            @endif
                            {{--<td class="text-center"><button class="btn btn-info details" data-toggle="modal" data-target="#ticket-{{$ticket->id}}" type="button"><i class="fa fa-info-circle"></i></button></td>--}}
                            <td class="text-center">
                                @if($ticket->qty_left > 0)
                                    <form method="post" action="{{url('checkout')}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                @else
                                    @if(($waitList == null) || ($ticket->waitings->count() >= $waitList->max_count))
                                        <strong class="ticket-sold-out">Sold Out</strong>
                                    @else
                                        <p class="showWailListForm" data-ticketID="{{$ticket->id}}">Add to Waiting List</p>
                                    @endif
                                @endif
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="ticket-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title" id="exampleModalLabel">Ticket Details</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="ticket_description_wrapper">
                                            <div class="description_details">
                                                <h4>Description</h4>
                                                @if(empty($ticket->description))
                                                    <p>No description for this ticket</p>
                                                @else
                                                    <p>{{$ticket->description}}</p>
                                                @endif
                                            </div>
                                            <div class="description_details">
                                                <ul class="clearfix">
                                                    <li><strong><i class="fa fa-calendar"></i>Ticket Sale Starts</strong></li>
                                                    <li>
                                                        @if(empty($ticket->selling_start))
                                                            <span>No Selling Start time disclosed yet</span>
                                                        @else
                                                            <span>{{$ticket->selling_start}}</span>
                                                        @endif
                                                    </li>
                                                    <li><strong><i class="fa fa-calendar"></i>Ticket Sale Ends</strong></li>
                                                    <li>
                                                        @if(empty($ticket->selling_end))
                                                            <span>No Selling end time disclosed yet</span>
                                                        @else
                                                            <span>{{$ticket->selling_end}}</span>
                                                        @endif
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="description_details">
                                                <ul class="clearfix">
                                                    <li><strong><i class="fa fa-ticket"></i>Ticket Status</strong></li>
                                                    <li><span>{{ucfirst($ticket->status)}}</span></li>
                                                    <li><strong><i class="fa fa-ticket"></i>Ticket Availability</strong></li>
                                                    <li><span>{{ucfirst($ticket->availability)}}</span></li>
                                                </ul>
                                            </div>

                                            <div class="description_details">
                                                <h4>Pass Per Order</h4>
                                                <ul class="clearfix pass_listing">
                                                    <li><strong><i class="fa fa-arrow-down  "></i>Min</strong></li>
                                                    <li>
                                                        @if(empty($ticket->min_order))
                                                            <span>No Minimum order limit</span>
                                                        @else
                                                            <span>{{$ticket->min_order}}</span>
                                                        @endif
                                                    </li>
                                                    <li><strong><i class="fa fa-arrow-up"></i>Max</strong></li>
                                                    <li>
                                                        @if(empty($ticket->max_order))
                                                            <span>No Maximum order limit</span>
                                                        @else
                                                            <span>{{$ticket->max_order}}</span>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="waitListForms">
                    @foreach($tickets as $ticket)
                        @if($waitList != null || $errors->any())
                            @include('events.partials.wait-list-sign-up-form')
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
@else
    <div>
        <p>No tickets Available</p>
    </div>
@endif
{{--@if(!$errors->isEmpty())--}}
    {{--<script type="text/javascript">--}}
        {{--var new_position = $('.listing-single').offset();--}}
        {{--$('html, body').stop().animate({ scrollTop: new_position.top }, 500);--}}
    {{--</script>--}}
{{--@endif--}}
<script type="text/javascript">
    $('.showWailListForm').click(function(event){
        event.preventDefault();
        var ticketID = $(this).attr('data-ticketID');
        $('#waitListForm-'+ticketID).removeClass('hidden');
        $('#waitListForm-'+ticketID).siblings().addClass('hidden');
    });
</script>