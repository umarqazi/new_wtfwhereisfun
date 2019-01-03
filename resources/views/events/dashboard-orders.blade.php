@extends('layouts.event-dashboard')
@section('title', "My Tickets")
@section('content')
    <div class="page_wrapper event-dashboard @if(strpos(url()->current(),'admin') == true) admin-view @endif">
        @if(strpos(url()->current(),'admin') == false)
            @include('events.partials.event-dashboard-sidebar')
        @endif
        <section class="content home ">
            @include('events.partials.event-dashboard-top-details')

            <h1>Recent Orders</h1>
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
@endsection