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
                        <div class="circle-logo">
                            <div class="circle-logo-name">Hot Deals</div>
                        </div>
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
                        {{-- Events Loop Here--}}

                        <div class="col-md-4 col-sm-6 col-xs-12 ldm-list-item">
                            <div class="ldm-list-wrap">
                                <div class="ldm-list-media">
                                    <div class="ldm-list-image ">
                                        {{-- Event Images--}}

                                        {{--<a href=""><img src="" alt="List Image" class="img-list-home" ></a> --}}
                                        {{-- Event Link--}}
                                    </div>
                                    <div class="ldm-list-profile-pic"><img src="asset{{'images/logo/1.jpg'}}" alt="Profile
                                Pic"></div>
                                </div><!-- /.ldm-list-media -->
                                <div class="ldm-list-content">
                                    <h3 class="ldm-list-title"><a href="{{-- Event Link--}}"></a></h3>
                                    <p>{{-- Event Title--}}</p>
                                    <div class="ldm-list-actions clearfix">
                                        <div class="ldml-vdetail-btn">
                                            <a class="btn" href="{{-- Event Link--}}">View Detail</a>
                                        </div>
                                        <div class="ldml-mab-btn">
                                            <a class="btn" href="{{-- Event Link-Map #Map--}}"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="ldml-direction-btn">
                                            <a class="btn" href="{{-- Event Link--}}"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            <div class="wiloke-sharing-post-social action__share-list hidden">
                                                <a class="share-facebook facebook fb-share-button" href="https://facebook.com/sharer.php?u=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;t=Chilean+Patagonia" data-href="https://listgo.wiloke.com/listing/chilean-patagonia/" target="_blank" title="Share on Facebook"> <i class="fa fa-facebook"></i> Facebook </a><a class="share-twitter twitter" href="https://twitter.com/intent/tweet?text=Chilean+Patagonia-https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;source=webclient" target="_blank" title="Share on Twitter"> <i class="fa fa-twitter"></i> Twitter </a><a class="share-googleplus googleplus" href="https://www.google.com/bookmarks/mark?op=edit&amp;bkmk=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on Google Plus"> <i class="fa fa-google-plus"></i> Google Plus </a><a class="share-digg digg" href="https://www.digg.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on Digg"> <i class="fa fa-digg"></i> Digg </a><a class="share-reddit reddit" href="https://reddit.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on Reddit"> <i class="fa fa-reddit"></i> Reddit </a><a class="share-linkedin linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on LinkedIn"> <i class="fa fa-linkedin"></i> LinkedIn </a><a class="share-stumbleupon stumbleupon" href="http://www.stumbleupon.com/submit?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;title=Chilean+Patagonia" target="_blank" title="Share on StumbleUpon"> <i class="fa fa-stumbleupon"></i> StumbleUpon </a><a class="share-tumblr tumblr" href="https://www.tumblr.com/share/link?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;name=Chilean+Patagonia" target="_blank" title="Share on Tumblr"> <i class="fa fa-tumblr"></i> Tumblr </a><a class="share-pinterest pinterest" href="https://pinterest.com/pin/create/button/?url=https%3A%2F%2Flistgo.wiloke.com%2Flisting%2Fchilean-patagonia%2F&amp;media=https%3A%2F%2Fi1.wp.com%2Flistgo.wiloke.com%2Fwp-content%2Fuploads%2F2017%2F07%2Fpost_355.jpg%3Ffit%3D640%252C427%26ssl%3D1&amp;description=Chilean+Patagonia" target="_blank" data-pin-do="buttonBookmark" title="Share on Pinterest"> <i class="fa fa-pinterest"></i> Pinterest </a><a class="share-mail mail" href="mailto:?Subject=Chilean%20Patagonia&amp;Body=Click%20on%20this%20link%20to%20read%20the%20article%20https://listgo.wiloke.com/listing/chilean-patagonia/" title="Send this article to an email"> <i class="fa fa-envelope"></i> Email </a><a class="share-link copy_link" href="#" data-shortlink="https://listgo.wiloke.com/listing/chilean-patagonia/" title="Copy link"> <i class="fa fa-link"></i> Copy Link </a> </div>
                                        </div>

                                        <div class="ldml-favorite-btn">
                                            <a class="btn" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div><!-- /.ldm-list-actions -->
                                </div><!-- /.ldm-list-content -->
                            </div>
                        </div>
                    </div>
                    <div class="landmarks-listings-all">
                        <a href="{{-- All Events Link--}}" class="ldm-all btn">View All Listing <i class="fa fa-facebookrrow-circle-o-right"></i></a>
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
                                            <img src="{{url('images/'.$category->image)}}" />
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
        </section><!-- /.upcoming-events-section -->
        <section class="testimonial-section">
            <div class="container">
                <div class="testimonial-wrap owl-carousel owl-theme">
                    @foreach($testimonials as $testimonial)
                        <div class="items">
                            <div class="testimonial-content text-center">
                                <div class="testimonial-profile-img">
                                    <img src="{{ $testimonial->thumbnail }}">
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

    @include('partials.signup-signin')
@endsection