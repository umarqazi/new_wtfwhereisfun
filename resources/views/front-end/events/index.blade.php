@extends('layouts.master')
@section('title', "Live Events :: Where's the fun")
@section('content')
    <div class="container">
        <div class="main-top-padding">
            <div class="public-event-listing">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="event-listing-heading">Live Events</h3>
                    </div>
                    @if(!empty($liveEvents))
                        @foreach($liveEvents as $event)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-inner">
                                        <div class="card-image">
                                            @php
                                                $link = url('events/'.encrypt_id($event->id));
                                            @endphp

                                            @if(empty($event->header_image))
                                                @php $img = asset('img/dummy.png') @endphp
                                            @else
                                                @php
                                                    $directory = getDirectory('events', $event->id);
                                                    $img = $directory['web_path'].$event->header_image;
                                                @endphp
                                            @endif

                                            <a href="{{$link}}" style="background-image: url({{$img}});">
                                                <span><i class="fa fa-search"></i></span>
                                            </a>

                                            <div class="card-actions">
                                                <a href="#"><i class="fa fa-bookmark"></i> <span>Save</span></a>
                                                <a href="#"><i class="fa fa-heart"></i> <span>Like</span></a>
                                            </div><!-- /.card-actions -->

                                        </div><!-- /.card-image -->

                                        <div class="card-content">
                                            <div class="event-organizer-thumbnail">
                                                @if(empty($event->organizer->thumbnail))
                                                    @php $img = asset('img/default-148.png') @endphp
                                                @else
                                                    @php
                                                        $directory = getDirectory('organizers', $event->organizer->id);
                                                        $img = $directory['web_path'].$event->organizer->thumbnail;
                                                    @endphp
                                                @endif
                                                <img src="{{$img}}" alt="Organizer Image">
                                            </div>
                                            <div class="card-date">
                                                <strong>{{$event->time_locations->first()->starting->day}}</strong>
                                                <span>{{get_month($event->time_locations->first()->starting)}}</span>
                                            </div><!-- /.card-date -->

                                            <h3 class="card-title">
                                                <a href="{{$link}}">{{$event->title}}</a>
                                            </h3>

                                            <h4 class="card-subtitle">
                                                <a href="{{$link}}">{{$event->time_locations->first()->location}}</a>
                                                @if(!is_null($event->hot_deal))
                                                    <span class="discount-text pull-right">
                                                        {{$event->hot_deal->discount}}%
                                                    </span>
                                                @endif
                                            </h4>
                                        </div><!-- /.card-content -->
                                    </div><!-- /.card-inner -->
                                </div><!-- /.card -->
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection