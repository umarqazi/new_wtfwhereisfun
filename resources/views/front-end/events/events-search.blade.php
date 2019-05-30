@extends('layouts.master')
@section('title', "Search Events")
@section('content')
    <div class="container">
        <div class="main-top-padding">
            <div class="public-event-listing">
                <div class="row">
                    <div class="col-md-12 find-events">
                        <form class="explore-search-form" id="search-events-form" action="{{url('search-events')}}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="es-field-wrap clearfix">
                                <div class="header_search_container">
                                    <div class="clm first_clm">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="fld" placeholder="Search Events" id="search-events" onkeyup="searchEvents(event)" onblur="hideSearchResults()" name="search_events" value="{{$data['search_events'] ? $data['search_events'] : ''}}"/>
                                        <ul class="search_dropdown" style="display: none;">
                                        </ul>
                                    </div>
                                    <div class="clm">
                                        <i class="fa fa-send"></i>
                                        <input type="text" class="fld" id="search-location" name="location" value="{{$city}}" onchange="checkLocation(this)">
                                    </div>
                                    <div class="clm">
                                        <i class="fa fa-calendar"></i>
                                        <input type='text' class="fld event-start-date" id="search-start-date" name="event-start-date" value="{{$data['event-start-date'] ? $data['event-start-date'] : ''}}"/>
                                    </div>
                                    <div class="clm">
                                        <i class="fa fa-calendar"></i>
                                        <input type='text' class="fld event-end-date" id="search-end-date" name="event-end-date" value="{{$data['event-end-date'] ? $data['event-end-date'] : ''}}"/>
                                    </div>
                                    <div class="clm third_clm">
                                        <button class="search_btn" type="submit" id="search-button">Search</button>
                                    </div>
                                </div>
                            </div><!-- /.es-field-wrap -->
                        </form>
                    </div>
                    <div class="col-md-12">
                        <h3 class="event-listing-heading">Search Results</h3>
                        @if($count > 0)
                            <p>{{$count}} Events Found</p>
                        @endif
                    </div>
                    @if(count($locationEvents))
                        @foreach($locationEvents as $location)
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

                                            <a href="{{$link}}" style="background-image: url({{$img}});" target="_blank">
                                                <span><i class="fa fa-search"></i></span>
                                            </a>

                                            <div class="card-actions">
                                                <a href="#"><i class="fa fa-bookmark"></i> <span>Save</span></a>
                                                <a href="#"><i class="fa fa-heart"></i> <span>Like</span></a>
                                            </div><!-- /.card-actions -->

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
                                                <a href="{{$link}}">{{$location->event->title}}</a>
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
                            <div class="no-events">
                                <h4>No Events Found</h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .checked {
            color: orange;
        }
    </style>
    <script type="text/javascript" src="{{asset('js/custom/search.js')}}"></script>
@endsection