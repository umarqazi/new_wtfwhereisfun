@extends('layouts.master')
@section('title', "Where's the fun")
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
                        <form class="explore-search-form">
                            <div class="es-field-wrap clearfix">
                                <div class="es-field es-field-adress">
                                    <label>Location</label>
                                    <input type="text" placeholder="Location" name="" class="input">
                                </div>
                                <div class="es-field es-field-location">
                                    <label>Event date from</label>
                                    <input type="text" placeholder="Event date from" name="" class="input">
                                </div>
                                <div class="es-field es-field-location">
                                    <label>Event date to</label>
                                    <input type="text" placeholder="Event date to" name="" class="input">
                                </div>
                                <div class="es-field es-field-btn">
                                    <input type="submit" name="" value="View events" class="btn submit">
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
                            <div class="circle-logo-img"><img src="{{asset('images/circle-logo.png')}}" alt="Circle
                        Logo"></div>
                        </div>
                    </div><!-- /.circle-logo-col -->
                    <div class="circle-logo-col cl-item-4">
                        <a href="{{url('events/hot-deals')}}">
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
                        <div @if(count($liveEvents) > 4) class="event-slider owl-carousel owl-theme" @endif>
                            @if(!empty($liveEvents))
                                @foreach($liveEvents as $event)
                                    @if(count($liveEvents) > 4)
                                        <div class="items">
                                            @else
                                                <div class="col-md-3">
                                                    @endif
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
                                                                @if(!empty($event->time_locations))
                                                                    <div class="card-date">
                                                                        <strong>{{$event->time_locations->first()->starting->day}}</strong>
                                                                        <span>{{get_month($event->time_locations->first()->starting)}}</span>
                                                                    </div><!-- /.card-date -->
                                                                @endif
                                                                <h3 class="card-title">
                                                                    <a href="{{$link}}" target="_blank">{{$event->title}}</a>
                                                                </h3>

                                                                <h4 class="card-subtitle">
                                                                    <a href="{{$link}}" target="_blank">{{$event->time_locations->first()->location}}</a>
                                                                </h4>
                                                            </div><!-- /.card-content -->
                                                        </div><!-- /.card-inner -->
                                                    </div><!-- /.card -->
                                                </div>

                                                @endforeach
                                            @endif
                                        </div>
                        </div>
                        <div class="landmarks-listings-all">
                            <a href="{{url('events/all')}}" class="ldm-all btn">View All Listing <i class="fa fa-facebookrrow-circle-o-right"></i></a>
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
                                            <img src="{{asset('storage/'.$category->image)}}" />
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

                <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
                <a id="scrollEnabling" title="Enable or disable scrolling on map" class="">Enable Scrolling</a>
                <div class="map" id="map" style="width: 100%; height: 500px;"></div>
            </div>
            <!-- /.home-map-wrap -->
        </section>
        <section class="testimonial-section">
            <div class="container">
                <div class="testimonial-wrap owl-carousel owl-theme">
                    @foreach($testimonials as $testimonial)
                        <div class="items">
                            <div class="testimonial-content text-center">
                                <div class="testimonial-profile-img">
                                    <img src="{{ asset('storage/'.$testimonial->image)}}">
                                </div>
                                <div class="testimonial-dis">
                                    <p>{{str_limit($testimonial->description, 160)}}</p>
                                    <div class="">
                                        <a class="testimonial-read-more" href="{{url('testimonials/'.encrypt_id
                                    ($testimonial->id))}}">Read More..</a>
                                    </div>
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
                                            <a href="#"><img src="{{$blog->image}}" alt="Blog image"></a>
                                        </div>
                                        <div class="blog-thumb-date">
                                            <div class="blog-thumb-day">{{$blog->created_at->day}}</div>
                                            <div class="blog-thumb-month">{{get_month($blog->created_at)}}</div>
                                        </div>
                                    </div><!-- /.blog-thumb-media -->
                                    <div class="blog-thumb-content">
                                        <h3 class="blog-thumb-title">
                                            <a href="{{url('blogs/'.encrypt_id($blog->id))}}">{{$blog->title}}</a>
                                        </h3>
                                        <div class="blog-thumb-des">
                                            <p>{{str_limit($blog->description, 300)}}</p>
                                        </div>
                                        <div class="blog-thumb-btn">
                                            <a class="btn" href="{{url('blogs/'.encrypt_id($blog->id))}}">Read More <i class="fa fa-arrow-circle-o-right"></i></a>
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
    </div><!-- /.main-content -->
    <style type="text/css">
        .checked {
            color: orange;
        }
    </style>
@endsection