@extends('layouts.master')
@section('title', "StubGuys")
<!-- ______________________ Start Banner __________________ -->
@section('content')
    <div class="explore-search-section">
        <div class="banner-bg-video-wrap">
            <video autoplay muted loop id="banner-bg-video">
                <source src="{{asset('images/home-top-bg.mov')}}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </div>
        <div class="explore-search-wrap white-text">
            <div class="container">
                <div class="explore-search-content">
                    <div class="explore-search-head">
                        <span class="es-head-subtitle">Explore This City</span>
                        <h1 class="es-head-title">What's Happening in Your City</h1>
                    </div>
                    <div class="explore-search-form-wrap">
                        <form class="explore-search-form" id="search-events-form" action="{{url('search-events')}}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="es-field-wrap clearfix">
                                <div class="header_search_container">
                                    <div class="clm first_clm">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="fld" placeholder="Search Events" id="search-events" onkeyup="searchEvents(event)" onblur="hideSearchResults()" name="search_events"/>
                                        <ul class="search_dropdown" style="display: none;">
                                        </ul>
                                    </div>
                                    <div class="clm">
                                        <i class="fa fa-send"></i>
                                        <input type="text" class="fld" name="location" value="{{$city}}" onchange="checkLocation(this)">
                                    </div>
                                    <div class="clm third_clm">
                                        <button class="search_btn" type="submit" id="search-button">Search</button>
                                    </div>
                                </div>
                            </div><!-- /.es-field-wrap -->
                        </form>
                    </div>
                </div>
            </div><!-- /.explore-search-wrap -->
        </div>
    </div><!-- /.explore-search-section -->

    <!-- ______________________ Start Main Content __________________ -->
    <div id="maincontent" class="main-content home-start">
        <section class="section circle-logo-section">
            <div class="container">
                <div class="circle-logo-wrap clearfix">
                    <div class="circle-logo-col cl-item-1">
                        <div class="circle-logo">
                            <div class="circle-logo-name">Sponsored</div>
                        </div>
                    </div><!-- /.circle-logo-col -->
                    <div class="circle-logo-col cl-item-2">
                        <div class="circle-logo">
                            <div class="circle-logo-name">Trending Events</div>
                        </div>
                    </div><!-- /.circle-logo-col -->
                    <div class="circle-logo-col cl-item-3">
                        <div class="circle-logo">
                            <div class="circle-logo-img"><img src="{{asset('img/logos/logo-icon.png')}}" alt="Circle
                        Logo"></div>
                        </div>
                    </div><!-- /.circle-logo-col -->
                    <div class="circle-logo-col cl-item-4">
                        <a href="{{url('event/hot-deals')}}">
                            <div class="circle-logo">
                                <div class="circle-logo-name">Hot Deals</div>
                            </div>
                        </a>
                    </div><!-- /.circle-logo-col -->
                    <div class="circle-logo-col cl-item-5">
                        <div class="circle-logo">
                            <div class="circle-logo-name">Exclusive Events</div>
                        </div>
                    </div><!-- /.circle-logo-col -->
                </div>
            </div>
        </section>
        <section class="section landmarks-listings-section">
            <div class="container">
                <div class="heading-title-wrap clearfix">
                    <div class="heading-title-left">
                        <h4 class="heading-subtitle">Entertainment At Its Best</h4>
                        <h2 class="heading-title">Explore</h2>
                    </div>
                    <div class="heading-dis">
                        <p> Maximize your experience with immediate awareness of thrill-seeking events</p>
                    </div>
                </div>
                <div class="landmarks-listings-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><span class="green">Today's</span> Events</h3>
                            <div @if(count($todayEvents) > 4) class="event-slider owl-carousel owl-theme" @endif>
                                @if(!empty($todayEvents))
                                    @foreach($todayEvents as $location)
                                        @if(count($todayEvents) > 4)
                                            <div class="item">
                                                @else
                                                    <div class="col-md-3">
                                                        @endif
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
                                                                        <a href="{{$link}}" target="_blank">{{$location->event->title}}</a>
                                                                    </h3>

                                                                    <h4 class="card-subtitle date-location">
                                                                        <p><a href="{{$link}}" target="_blank"><i class="fa fa-calendar green"></i> {{$location->starting->format('D, M d')}} - {{$location->ending->format('D, M d')}}</a></p>
                                                                        <p><a href="{{$link}}" target="_blank"><i class="fa fa-map-marker green"></i> {{$location->location}}</a></p>
                                                                    </h4>
                                                                </div><!-- /.card-content -->
                                                            </div><!-- /.card-inner -->
                                                        </div><!-- /.card -->
                                                    </div>

                                                    @endforeach
                                                @endif

                                            </div>
                                            <div class="landmarks-listings-all view_all_btn pull-right">
                                                <a href="{{route('today-events')}}" class="ldm-all">View All <i class="fa fa-facebookrrow-circle-o-right"></i></a>
                                            </div>

                            </div>
                        </div>


                    <div class="row">
                        <div class="col-md-12">
                            <h3><span class="green">Future</span> Events</h3>
                            <div @if(count($futureEvents) > 4) class="event-slider owl-carousel owl-theme" @endif>
                                @if(!empty($futureEvents))
                                    @foreach($futureEvents as $location)
                                        @if(count($futureEvents) > 4)
                                            <div class="items">
                                                @else
                                                    <div class="col-md-3">
                                                        @endif
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
                                                                        <a href="{{$link}}" target="_blank">{{$location->event->title}}</a>
                                                                    </h3>

                                                                    <h4 class="card-subtitle date-location">
                                                                        <p><a href="{{$link}}" target="_blank"><i class="fa fa-calendar green"></i> {{$location->starting->format('D, M d')}} - {{$location->ending->format('D, M d')}}</a></p>
                                                                        <p><a href="{{$link}}" target="_blank"><i class="fa fa-map-marker green"></i> {{$location->location}}</a></p>
                                                                    </h4>
                                                                </div><!-- /.card-content -->
                                                            </div><!-- /.card-inner -->
                                                        </div><!-- /.card -->
                                                    </div>

                                                    @endforeach
                                                @endif
                                            </div>

                                            <div class="landmarks-listings-all pull-right view_all_btn">
                                                <a href="{{route('future-events')}}" class="ldm-all">View All<i class="fa fa-facebookrrow-circle-o-right"></i></a>
                                            </div>

                            </div>
                        </div>

                </div>
            </div>
        </section><!-- /.landmarks-listings-section -->
        <section class="explore-cities-section">
            <div class="container">
                <div class="heading-title-wrap clearfix">
                    <div class="heading-title-left">
                        <h4 class="heading-subtitle">Fun In All Forms </h4>
                        <h2 class="heading-title">Categories</h2>
                    </div>
                    <div class="heading-dis">
                        <p>Discover all there is to offer with an abundance of exciting genres  to choose from.</p>
                    </div>
                </div>
                <div class="explore-cities-wrap">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-sm-4">
                                <div class="ex-cities-item-wrap">
                                    <a href="javascript:void(0)">
                                        <div class="ex-cities-img-box">
                                            <img src="{{$categoriesPath['web_path'].$category->image}}" />
                                        </div>
                                        <div class="ex-cities-title-wrap">
                                            <h3 class="ex-cities-title">{{$category->name}}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="section home-map-section">
            <div class="home-map-wrap">
                <div class="map" id="event-map" style="width: 100%; height: 500px;">
                    {!! Mapper::render() !!}
                </div>
            </div>
            <!-- /.home-map-wrap -->
        </section>

        @if(count($testimonials))
            <section class="testimonial-section">
                <div class="container">
                    <div class="testimonial-wrap owl-carousel owl-theme">
                        @foreach($testimonials as $testimonial)
                            <div class="items">
                                <div class="testimonial-content text-center">
                                    <div class="testimonial-profile-img">
                                        <img src="{{ $testimonialsPath['web_path'].$testimonial->image}}">
                                    </div>
                                    <div class="testimonial-dis">
                                        <p>{{str_limit($testimonial->description, 180)}}</p>
                                    </div>
                                    <div class="testimonial-meta">
                                        <div class="tml-auther-name">{{$testimonial->name}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if(count($blogs))
            <section class="section blog-thumb-section">
                <div class="container">
                    <div class="heading-title-wrap clearfix">
                        <div class="heading-title-left">
                            <h4 class="heading-subtitle">You Heard It First!</h4>
                            <h2 class="heading-title">Blogs</h2>
                        </div>
                        <div class="heading-dis">
                            <p>Stay up to date with the latest news and trends </p>
                        </div>
                    </div>
                    <div class="blog-thumb-wrap">
                        <div class="blog-thumbnail-slider owl-carousel owl-theme">
                            @foreach($blogs as $blog)
                                <div class="item">
                                    <div class="blog-thumb-inner">
                                        <div class="blog-thumb-media">
                                            <div class="blog-thumb-img">
                                                <a href="{{url('blogs/'.$blog->encrypted_id)}}">
                                                    <img src="{{$blog->directory.$blog->image}}" alt="Blog image">
                                                </a>
                                            </div>
                                            <div class="blog-thumb-date">
                                                <div class="blog-thumb-day">{{$blog->created_at->day}}</div>
                                                <div class="blog-thumb-month">{{get_month($blog->created_at)}}</div>
                                            </div>
                                        </div><!-- /.blog-thumb-media -->
                                        <div class="blog-thumb-content">
                                            <h3 class="blog-thumb-title">
                                                <a href="{{url('blogs/'.$blog->encrypted_id)}}">{{$blog->title}}</a>
                                            </h3>
                                            <div class="blog-thumb-des">
                                                {!!  str_limit($blog->description, 300) !!}
                                            </div>
                                            <div class="blog-thumb-btn">
                                                <a class="btn" href="{{url('blogs/'.$blog->encrypted_id)}}">Read More <i class="fa fa-arrow-circle-o-right"></i></a>
                                            </div>
                                        </div><!-- /.blog-thumb-content -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="cur_lat_name" id="cur_lat" value="">
                    <input type="hidden" name="cur_lng_name" id="cur_lng" value="">
                </div>
            </section><!-- /.blog-thumb-section -->
        @endif
    </div><!-- /.main-content -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .checked {
            color: orange;
        }
    </style>
    <script type="text/javascript" src="{{asset('js/custom/search.js')}}"></script>
@endsection