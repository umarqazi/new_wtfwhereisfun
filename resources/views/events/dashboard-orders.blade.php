@extends('layouts.event-dashboard')
@section('title', "My Tickets :: StubGuys")
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
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon l-amber"><i class="zmdi zmdi-chart-donut"></i></div>
                                    <div class="col-in">
                                        <h4 class="counter m-b-0">{{$totalRevenue['count']}}</h4>
                                        <small class="text-muted m-t-0">Total Orders</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon l-turquoise"><i class="zmdi zmdi-chart"></i></div>
                                    <div class="col-in">
                                        <h4 class="counter m-b-0">${{$totalRevenue['totalRevenue']}}</h4>
                                        <small class="text-muted m-t-0">Total Revenue</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="icon l-parpl"><i class="zmdi zmdi-card"></i></div>
                                    <div class="col-in">
                                        <h4 class="counter m-b-0">{{$totalRevenue['revenuePercentage']}}%</h4>
                                        <small class="text-muted m-t-0">{{$totalRevenue['revenuePercentage']}}% Tickets Sold</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent_orders_listing">
                @if(count($totalRevenue['orders']))
                    @foreach($totalRevenue['orders'] as $order)
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
                                            $directory = getDirectory('events', $order->event->id);
                                            $img = $directory['web_path'].$order->event->header_image;
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
                                    <span>Amount Paid : <strong>${{$order->payment_gross}}</strong></span><br>
                                    <span class="payment-status">Payment Status : <strong>Completed</strong></span>
                                    <span class="payment-method">Payment Method : <strong>{{ucfirst($order->payment_method)}}</strong></span><br>
                                    <span>Bought at : <strong>{{monthDateYearFromat($order->created_at)}}</strong></span><br>
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