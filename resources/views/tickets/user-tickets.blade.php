@extends('layouts.master')
@section('title', "My Tickets :: Where's the fun")
@section('content')
    <div class="my-tickets">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card member-card ">
                        <div class="header l-green">
                            <h4 class="m-t-10">{{$user->first_name.' '.$user->last_name}}</h4>
                        </div>
                        <div class="member-img tickets_profile">
                            @if(!empty($user->profile_thumbnail))
                                @php
                                    $img = $directory.$user->profile_thumbnail;
                                @endphp
                            @else
                                @php
                                    $img = asset('img/default-148.png')
                                @endphp
                            @endif

                            <img src="{{$img}}" alt="profile-image" id="user-img">
                        </div>

                    </div>
                </div>

                <div class="col-md-8">
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
                                        <h4><a href="{{url('events/'.encrypt_id($order->event->id))}}">{{$order->event->title}}</a></h4>
                                        <strong class="ticket-name">Ticket Name : {{$order->ticket->name}}</strong><br>
                                        <span class="ticket-location">Location</span>
                                        <span class="ticket-time">Start Date Time</span><br>
                                        <span>Amount Paid : <strong>${{$order->payment_gross}}</strong></span><br>
                                        <span>Bought at : <strong>{{monthDateYearFromat($order->created_at)}}</strong></span><br>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div><p>No Tickets Purchased yet</p></div>
                    @endif
                </div>
            </div>
        </div>
    </div>




@endsection