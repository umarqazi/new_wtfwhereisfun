@extends('layouts.event-dashboard')
@section('title', "My Tickets")
@section('content')
    <div class="page_wrapper event-dashboard @if(strpos(url()->current(),'admin') == true) admin-view @endif">
        @if(strpos(url()->current(),'admin') == false)
            @include('events.partials.event-dashboard-sidebar')
        @endif
        <section class="content home ">
            @include('events.partials.event-dashboard-top-details')

            <div class="row">
                <div class="col-md-6">
                    <h1>Recent Orders</h1>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card product-report">
                        <div class="body">
                            <div class="row clearfix m-b-15">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="icon l-amber"><i class="zmdi zmdi-chart-donut"></i></div>
                                    <div class="col-in">
                                        <h4 class="counter m-b-0">{{$allOrders['count']}}</h4>
                                        <small class="text-muted m-t-0">Total Orders</small>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="icon l-turquoise"><i class="zmdi zmdi-chart-donut"></i></div>
                                    <div class="col-in">
                                        <h4 class="counter m-b-0">{{$completedOrders['count']}}</h4>
                                        <small class="text-muted m-t-0">Completed Orders</small>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="icon l-amber"><i class="zmdi zmdi-chart"></i></div>
                                    <div class="col-in">
                                        <h4 class="counter m-b-0">${{$completedOrders['totalRevenue']}}</h4>
                                        <small class="text-muted m-t-0">Total Revenue</small>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="icon l-turquoise"><i class="zmdi zmdi-card"></i></div>
                                    <div class="col-in">
                                        <h4 class="counter m-b-0">{{$completedOrders['revenuePercentage']}}%</h4>
                                        <small class="text-muted m-t-0">{{$completedOrders['revenuePercentage']}}% Tickets Sold</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(strpos(url()->current(),'admin') == true)
            <div class="row">
                <div class="col-md-6">
                    <h1>Payout Details</h1>
                </div>
                    <div class="col-md-6">
                        <button id="payout_btn" class="btn btn-sm rounded-border pull-right" data-toggle="modal" data-target="#payout_modal">Payout</button>
                    </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card product-report">
                        <div class="body">
                            <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">S.No</th>
                            <th class="text-center">Transaction ID</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Payment Status</th>
                            <th class="text-center">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($payoutDetails) > 0)
                            @foreach($payoutDetails as $key => $record)
                            <tr>
                                <td class="text-center">{{$key + 1}}</td>
                                <td class="text-center">{{$record->transaction_id}}</td>
                                <td class="text-center">${{$record->amount}}</td>
                                <td class="text-center">{{$record->payment_status}}</td>
                                <td class="text-center">{{$record->created_at}}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center red bold" colspan="5">No Payout yet!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <h1>Event Orders</h1>
                </div>
            </div>
            <div class="recent_orders_listing">
                @if(count($allOrders['orders']))
                    @foreach($allOrders['orders'] as $order)
                        <div class="ticket-content">
                            <div class="date">
                                {{get_month($order->ticket->time_location->starting)}}<br>
                                <span>{{$order->ticket->time_location->starting->day}}</span>
                            </div>
                            <div class="ticket-wrapper">
                                <div class="event-image">
                                    <div class="ticket_count">{{$order->quantity}} Tickets</div>
                                    @if(!empty($order->event->header_image))
                                        @php
                                            $img = $order->event->directory.$order->event->header_image;
                                        @endphp
                                    @else
                                        @php
                                            $img = asset('img/dummy.jpg')
                                        @endphp
                                    @endif
                                    <img src="{{$img}}" alt="profile-image" id="target" width="200" height="200">
                                </div>
                                <div class="event-ticket-details">
                                    <h4>{{$order->ticket->name}}</h4>
                                    @if(empty($order->user->first_name))
                                        <span>User : <strong class="ticket-name">{{$order->user->email}}</strong></span><br>
                                    @else
                                        <span>User : <strong class="ticket-name">{{$order->user->first_name.' '.$order->user->last_name}}</strong></span><br>
                                    @endif

                                    @if($order->payment_status != 'refunded')
                                        <span>Amount Paid : <strong>${{$order->payment_gross}}</strong></span><br>
                                        <span>Bought at : <strong>{{monthDateYearFromat($order->created_at)}}</strong></span><br>
                                    @else
                                        <span>Amount Refunded : <strong>${{($order->refunded_amount)}}</strong></span><br>
                                        <span>Refunded at : <strong>{{monthDateYearFromat($order->updated_at)}}</strong></span><br>
                                    @endif
                                    <span>Order Status : <strong>{{ucfirst($order->payment_status)}}</strong></span><br>
                                    <span class="">Payment Method : <strong>{{ucfirst($order->payment_method)}}</strong></span><br>
                                    @if(strpos(url()->current(),'admin') == true)
                                        <span>Vendor : <strong>{{($order->event->vendor->first_name)}} {{($order->event->vendor->last_name)}}</strong></span><br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <p>
                            <strong>No Orders on this Event!</strong>
                        </p>
                    </div>
                @endif
            </div>
        </section>
    </div>
    @if(strpos(url()->current(),'admin') == true)
        <div id="payout_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Payout</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="{{url()->current().'/payout'}}" method="POST" id="payout-form">
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Payout Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter payout email" required>
                                    @if ($errors->has('email'))
                                        <div class="row">
                                            <div class="col-md-12 pl-20">
                                                <p class="bold red">{{ $errors->default->first('email') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="amount">Amount:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter payout amount" min="1" max="{{$completedOrders['totalRevenue']}}" required>
                                    @if ($errors->has('amount'))
                                        <div class="row">
                                            <div class="col-md-12 pl-20">
                                                <p class="bold red">{{ $errors->default->first('amount') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm rounded-border" form="payout-form">Submit</button>
                        <button type="button" class="btn btn-sm rounded-border mb-10" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        @php
            //dd($errors);
        @endphp
        @if(!$errors->isEmpty())
            <script type="text/javascript">
                $(window).on('load',function(){
                    $("#payout_btn").click();
                });
            </script>
        @endif
    @endif
@endsection