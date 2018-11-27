@extends('layouts.master')
@section('title', "My Tickets :: Where's the fun")
@section('content')

    <div class="eventDashboard">
        <div class="container">
            <h1>Event Dashboard</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="eventDashboard_block">
                        <i class="fa fa-pencil"></i>
                        <h2>Missing info</h2>
                        <p>Your event will be ready to make live as soon as you:</p>
                        <a href="{{url('events/'.$eventId.'/edit')}}">Enter an event title <br> Add tickets to your event</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="eventDashboard_block">
                        <i class="fa fa-globe"></i>
                        <h2>Public Edit</h2>
                        <p>Your event will be listed and searchable once it's live.</p>
                        <a href="{{url('events/'.$eventId.'/edit')}}">Edit</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="eventDashboard_block">
                        <i class="fa fa-ticket"></i>
                        <h2>{{$totalTicketsSold}} Tickets Sold </h2>
                        <p>Total Orders : <strong class="count">{{$orders->count()}}</strong></p>
                        <p>Total Revenue : <strong class="count">${{$orders->sum('payment_gross') }}</strong></p>
                    </div>
                </div>
            </div>
            <h1>Recent Orders</h1>
            <div class="recent_orders_listing">
                @if(!empty($orders))
                    @foreach($orders as $order)
                        <div class="ticket-content">
                            <div class="date">
                                nov<br>
                                <span>11</span>
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div><p>No Orders Yet</p></div>
                @endif
            </div>
        </div>
    </div>

@endsection