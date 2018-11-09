<!DOCTYPE html>
<html lang="en">
<head>

    <title>{{$organizer->name}} Profile</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/Bootstrap/dist/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/Bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/Bootstrap/dist/css/bootstrap-grid.css')}}">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/css/main.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/css/fonts.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/css/organizer-profile-custom.css')}}">
    <!-- Main Font -->
    <script src="{{asset('html-social-network/js/webfontloader.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>


</head>
<body>

<header class="header header-responsive" id="site-header-responsive">

    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#request" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                        <div class="label-avatar bg-blue">6</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#chat" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                        <div class="label-avatar bg-purple">2</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-thunder-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>
                        <div class="label-avatar bg-primary">8</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#search" role="tab">
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                    <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                </a>
            </li>
        </ul>
    </div>

    <!-- Tab panes -->

</header>

<!-- ... end Responsive Header-BP -->



<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header top-header-favorit">
                    <div class="top-header-thumb">
                        @if(!empty($organizer->image))
                            <img src="{{$organizerDirectory['web_path'].$organizer->image}}" alt="author">
                        @else
                            {{--<img src="{{asset('html-social-network/img/top-header2.jpg')}}" alt="nature">--}}
                            <img src="{{asset('img/dummy.jpg')}}" alt="nature">
                        @endif
                        <div class="top-header-author">
                            <div class="author-thumb">
                                @if(!empty($organizer->thumbnail))
                                    <img src="{{$organizerDirectory['web_path'].$organizer->thumbnail}}" alt="author">
                                @else
                                    <img src="{{asset('img/default-148.png')}}" alt="author">
                                @endif
                            </div>
                            <div class="author-content">
                                <a href="#" class="h3 author-name">{{$organizer->name}}</a>
                                <div class="country">{{$organizer->location}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-section">

                        <div class="control-block-button">
                            <a href="#" class="btn btn-control bg-primary">
                                <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                            </a>

                            <a href="#" class="btn btn-control bg-purple">
                                <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

            <div class="row">

                @foreach($events as $event)
                    <div class="photo-album-item-wrap col-3-width">
                        <div class="photo-album-item" data-mh="album-item" style="height: 417.547px;">
                            <div class="photo-item organizer-event-image">
                                @if(!empty($event->header_image))
                                    @php
                                        $src = getDirectory('events', $event->id);
                                        $headerImage = $src['web_path'].$event->header_image;
                                    @endphp
                                @else
                                    @php $headerImage = asset('img/dummy.jpg'); @endphp
                                @endif

                                <img src="{{url($headerImage)}}" alt="photo">
                                <div class="overlay overlay-dark"></div>
                                <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
                                <a href="#" class="post-add-icon">
                                    <svg class="olymp-heart-icon"><use xlink:href="#olymp-heart-icon"></use></svg>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
                            </div>

                            <div class="content">
                                @php $eventUrl = url('events/'.encrypt_id($event->id)); @endphp
                                <a href="{{$eventUrl}}" class="title h5">{{$event->title}}</a>
                                @if(count($event->time_locations))
                                    <span class="sub-title">{{$event->time_locations->first()->location}}</span>
                                @endif

                                <div class="swiper-container swiper-swiper-unique-id-0 initialized swiper-container-horizontal" id="swiper-unique-id-0">
                                    <div class="swiper-wrapper" style="width: 836px; transform: translate3d(-209px, 0px, 0px); transition-duration: 0ms;">
                                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 209px;">
                                            @if(count($event->images))
                                                @foreach($event->images as $img)
                                                    <ul class="friends-harmonic">
                                                        <li>
                                                            <a href="#">
                                                                <img src="{{url($src['web_path'].$img->name)}}" alt="friend">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="swiper-slide swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="1" style="width: 209px;">
                                            <div class="friend-count" data-swiper-parallax="-500" style="transform: translate3d(500px, 0px, 0px); transition-duration: 0ms;">
                                                <a href="{{$eventUrl}}" class="friend-count-item">
                                                    <div class="h6">{{$event->tickets->count()}}</div>
                                                    <div class="title">Tickets</div>
                                                </a>
                                                <a href="{{$eventUrl}}" class="friend-count-item">
                                                    <div class="h6">{{$event->time_locations->count()}}</div>
                                                    <div class="title">Time & Locations</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- If we need pagination -->
                                    <div class="swiper-pagination pagination-swiper-unique-id-0 swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span></div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>

        <div class="col col-xl-3 order-xl-1 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">About {{$organizer->name}}</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                </div>
                <div class="ui-block-content">

                    <!-- W-Personal-Info -->

                    <ul class="widget w-personal-info item-block">
                        @if(!empty($organizer->description))
                            <li>
                                <span class="text">{{$organizer->description}}</span>
                            </li>
                        @endif

                        @if(!empty($organizer->email))
                            <li>
                                <span class="title">Email:</span>
                                <span class="text">{{$organizer->email}}</span>
                            </li>
                        @endif

                        @if(!empty($organizer->contact))
                            <li>
                                <span class="title">Contact:</span>
                                <span class="text">{{$organizer->contact}}</span>
                            </li>
                        @endif

                        @if(!empty($organizer->website))
                            <li>
                                <span class="title">Website:</span>
                                <a href="{{$organizer->website}}" class="text">{{$organizer->website}}</a>
                            </li>
                        @endif
                        @if(!empty($organizer->created_at))
                            <li>
                                <span class="title">Since:</span>
                                <span class="text">{{monthDateYearFromat($organizer->created_at)}}</span>
                            </li>
                        @endif
                    </ul>

                    <!-- ... end W-Personal-Info -->
                </div>
            </div>

            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Social Networks</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                </div>
                <div class="ui-block-content">
                    <!-- W-Socials -->

                    <div class="widget w-socials">
                        <h6 class="title">Other Social Networks:</h6>

                        @if(!empty($organizer->facebook))
                            <a href="{{$organizer->facebook}}" class="social-item bg-facebook">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                Facebook
                            </a>
                        @endif

                        @if(!empty($organizer->twitter))
                            <a href="{{$organizer->twitter}}" class="social-item bg-twitter">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                Twitter
                            </a>
                        @endif

                        @if(!empty($organizer->instagram))
                            <a href="{{$organizer->instagram}}" class="social-item bg-instagram">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                Instagram
                            </a>
                        @endif

                        @if(!empty($organizer->google))
                            <a href="{{$organizer->google}}" class="social-item bg-google">
                                <i class="fab fa-google" aria-hidden="true"></i>
                                Google
                            </a>
                        @endif

                        @if(!empty($organizer->timbler))
                            <a href="{{$organizer->timbler}}" class="social-item bg-timbler">
                                <i class="fab fa-tumblr" aria-hidden="true"></i>
                                Tumbler
                            </a>
                        @endif

                        @if(!empty($organizer->linkedin))
                            <a href="{{$organizer->linkedin}}" class="social-item bg-linkedin">
                                <i class="fab fa-linkedin" aria-hidden="true"></i>
                                Linkedin
                            </a>
                        @endif
                    </div>


                    <!-- ... end W-Socials -->
                </div>
            </div>

        </div>
    </div>
</div>




<a class="back-to-top" href="#">
    <img src="{{asset('html-social-network/svg-icons/back-to-top.svg')}}" alt="arrow" class="back-icon">
</a>

<!-- JS Scripts -->
<script src="{{asset('html-social-network/js/jquery-3.2.1.js')}}"></script>
<script src="{{asset('html-social-network/js/jquery.appear.js')}}"></script>
<script src="{{asset('html-social-network/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('html-social-network/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('html-social-network/js/jquery.matchHeight.js')}}"></script>
<script src="{{asset('html-social-network/js/svgxuse.js')}}"></script>
<script src="{{asset('html-social-network/js/imagesloaded.pkgd.js')}}"></script>
<script src="{{asset('html-social-network/js/Headroom.js')}}"></script>
<script src="{{asset('html-social-network/js/velocity.js')}}"></script>
<script src="{{asset('html-social-network/js/ScrollMagic.js')}}"></script>
<script src="{{asset('html-social-network/js/jquery.waypoints.js')}}"></script>
<script src="{{asset('html-social-network/js/jquery.countTo.js')}}"></script>
<script src="{{asset('html-social-network/js/popper.min.js')}}"></script>
<script src="{{asset('html-social-network/js/material.min.js')}}"></script>
<script src="{{asset('html-social-network/js/bootstrap-select.js')}}"></script>
<script src="{{asset('html-social-network/js/smooth-scroll.js')}}"></script>
<script src="{{asset('html-social-network/js/selectize.js')}}"></script>
<script src="{{asset('html-social-network/js/swiper.jquery.js')}}"></script>
<script src="{{asset('html-social-network/js/moment.js')}}"></script>
<script src="{{asset('html-social-network/js/daterangepicker.js')}}"></script>
<script src="{{asset('html-social-network/js/simplecalendar.js')}}"></script>
<script src="{{asset('html-social-network/js/fullcalendar.js')}}"></script>
<script src="{{asset('html-social-network/js/isotope.pkgd.js')}}"></script>
<script src="{{asset('html-social-network/js/ajax-pagination.js')}}"></script>
<script src="{{asset('html-social-network/js/Chart.js')}}"></script>
<script src="{{asset('html-social-network/js/chartjs-plugin-deferred.js')}}"></script>
<script src="{{asset('html-social-network/js/circle-progress.js')}}"></script>
<script src="{{asset('html-social-network/js/loader.js')}}"></script>
<script src="{{asset('html-social-network/js/run-chart.js')}}"></script>
<script src="{{asset('html-social-network/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('html-social-network/js/jquery.gifplayer.js')}}"></script>
<script src="{{asset('html-social-network/js/mediaelement-and-player.js')}}"></script>
<script src="{{asset('html-social-network/js/mediaelement-playlist-plugin.min.js')}}"></script>

<script src="{{asset('html-social-network/js/base-init.js')}}"></script>
<script defer src="{{asset('html-social-network/fonts/fontawesome-all.js')}}"></script>

<script src="{{asset('html-social-network/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>

</body>
</html>