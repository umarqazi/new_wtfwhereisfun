@extends('layouts.master')
@section('title', "StubGuys")
<!-- ______________________ Start Banner __________________ -->
@section('content')
    <div  id="maincontent" class="categories-wrapper">
        <div class="container">
            <div class="events-filter">
                <select id="category-filter" name="category-filter" class="form-control category-filter">
                    <option disabled="disabled" selected>Select A Category</option>
                    @foreach($result['categories'] as $category)
                        @if($category->slug !== 'more')
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 events_container">
                @if(count($result['events']))
                    @foreach($result['events'] as $event)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="card-image">
                                        @php
                                            $link = route('showById', ['id' => $event->event->encrypted_id, 'locationId' => $event->encrypted_id ]);
                                        @endphp

                                        @if(empty($event->event->header_image))
                                            @php $img = asset('img/dummy.png') @endphp
                                        @else
                                            @php
                                                $img = $event->event->directory.$event->event->header_image;
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
                                            @if(empty($event->event->organizer->thumbnail))
                                                @php $img = asset('img/default-148.png') @endphp
                                            @else
                                                @php
                                                    $img = $event->event->organizer->directory.$event->event->organizer->thumbnail;
                                                @endphp
                                            @endif
                                            <img src="{{$img}}" alt="Organizer Image">
                                        </div>
                                        <div class="card-date">
                                            <strong>{{$event->starting->day}}</strong>
                                            <span>{{get_month($event->starting)}}</span>
                                        </div><!-- /.card-date -->
                                        <h3 class="card-title">
                                            <a href="{{$link}}">{{$event->event->title}}</a>
                                        </h3>

                                        <h4 class="card-subtitle date-location">
                                            <p><a href="{{$link}}"><i class="fa fa-calendar green"></i> {{$event->starting->format('D, M d')}} - {{$event->ending->format('D, M d')}}</a></p>
                                            <p><a href="{{$link}}"><i class="fa fa-map-marker green"></i> {{$event->location}}</a></p>
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
@endsection