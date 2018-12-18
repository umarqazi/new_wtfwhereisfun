@extends('layouts.master')
@section('title', "My Tickets ")
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
                    @if(count($orders))
                        <h3>My Tickets</h3>
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
                                        <h4><a href="{{route('showById', ['id' => $order->event->encrypted_id, 'locationId' => $order->ticket->time_location->encrypted_id ])}}">{{$order->event->title}}</a></h4>
                                        <strong class="ticket-name">Ticket Name : {{$order->ticket->name}}</strong><br>
                                        <span class="ticket-location"><i class="fa fa-map-marker green"></i> {{$order->ticket->time_location->location}}</span><br>
                                        <span class="ticket-date"><i class="fa fa-calendar green"></i> {{monthDateYearFromat($order->ticket->time_location->starting)}} - {{monthDateYearFromat($order->ticket->time_location->ending)}}</span><br>
                                        <span class="ticket-time"><i class="fa fa-clock green"></i> {{$order->ticket->time_location->starting->format('g:i A')}} - {{$order->ticket->time_location->ending->format('g:i A')}}</span><br>
                                        <span>Amount Paid : <strong>${{$order->payment_gross}}</strong></span><br>
                                        <span>Bought at : <strong>{{monthDateYearFromat($order->created_at)}}</strong></span><br>
                                    </div>
                                    <a href="{{url('ticket-dispute/'.encrypt_id($order->id))}}" class="btn btn-sm rounded-border pull-right" >Dispute</a>
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