@extends('layouts.master')
@section('title', "Trending Events ")
@section('content')
    <div class="container">
        <div class="main-top-padding">
            <div class="public-event-listing">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="event-listing-heading">Trending Events</h3>
                    </div>
                    @if(count($trending))
                        @foreach($trending as $location)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-inner">
                                        <div class="card-image">
                                            @php
                                                $link = route('showById', ['id' => $location->event->encrypted_id, 'locationId' => $location->encrypted_id ]);
                                            @endphp

                                            @if(empty($location->event->header_image))
                                                @php $img = asset('img/dummy.png') @endphp
                                            @else
                                                @php
                                                    $img = $location->event->directory.$location->event->header_image;
                                                @endphp
                                            @endif

                                            <a href="{{$link}}" style="background-image: url({{$img}});">
                                                <span><i class="fa fa-search"></i></span>
                                            </a>

                                        </div><!-- /.card-image -->

                                        <div class="card-content">
                                            <div class="event-organizer-thumbnail">
                                                @if(empty($location->event->organizer->thumbnail))
                                                    @php $img = asset('img/default-148.png') @endphp
                                                @else
                                                    @php
                                                        $img = $location->event->organizer->directory.$location->event->organizer->thumbnail;
                                                    @endphp
                                                @endif
                                                <img src="{{$img}}" alt="Organizer Image">
                                            </div>
                                            <div class="card-date">
                                                <strong>{{$location->starting->day}}</strong>
                                                <span>{{get_month($location->starting)}}</span>
                                            </div><!-- /.card-date -->
                                            <h3 class="card-title">
                                                <a href="{{$link}}">{{$location->event->title}} @if(!is_null($location->hot_deal)) <span class="badge badge-success pull-right hot-deal-badge">Deal</span>@endif</a>
                                            </h3>

                                            <h4 class="card-subtitle date-location">
                                                <p><a href="{{$link}}"><i class="fa fa-calendar green"></i> {{$location->starting->format('D, M d')}} - {{$location->ending->format('D, M d')}}</a></p>
                                                <p><a href="{{$link}}"><i class="fa fa-map-marker green"></i> {{$location->location}}</a></p>
                                            </h4>
                                        </div><!-- /.card-content -->
                                    </div><!-- /.card-inner -->
                                </div><!-- /.card -->
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <p><strong>No Trending Events Found!</strong></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection