@extends('layouts.master')
@section('title', "My Tickets ")
@section('content')
    <div class="my-tickets main-top-padding">
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
                                        <h4><a href="{{route('showById', ['id' => $order->event->encrypted_id, 'locationId' => $order->ticket->time_location->encrypted_id ])}}">{{$order->event->title}}</a></h4>
                                        <strong class="ticket-name">Ticket Name : {{$order->ticket->name}}</strong><br>
                                        <span class="ticket-location"><i class="fa fa-map-marker green"></i> {{$order->ticket->time_location->location}}</span><br>
                                        @if($order->payment_status != 'refunded')
                                            <span class="ticket-date"><i class="fa fa-calendar green"></i> {{monthDateYearFromat($order->ticket->time_location->starting)}} - {{monthDateYearFromat($order->ticket->time_location->ending)}}</span><br>
                                            <span class="ticket-time"><i class="fa fa-clock green"></i> {{$order->ticket->time_location->starting->format('g:i A')}} - {{$order->ticket->time_location->ending->format('g:i A')}}</span><br>
                                            <span>Amount Paid : <strong>{{strtoupper($order->currency_code).' '.$order->payment_gross}}</strong></span><br>
                                            <span>Bought at : <strong>{{monthDateYearFromat($order->created_at)}}</strong></span><br>
                                        @else
                                            <span>Order Status : <strong>{{ucfirst($order->payment_status)}}</strong></span><br>
                                            <span>Amount Refunded : <strong>{{strtoupper($order->currency_code).' '.$order->refunded_amount}}</strong></span><br>
                                            <span>Refunded at : <strong>{{monthDateYearFromat($order->updated_at)}}</strong></span><br>
                                        @endif
                                    </div>
                                    @if($order->payment_status != 'refunded')
                                        <a href="{{url('ticket-dispute/'.$order->encrypted_id)}}" class="btn btn-sm rounded-border pull-right" >Dispute</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div>
                            <h4>
                                <strong>No Tickets Purchased yet</strong>
                            </h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>




@endsection