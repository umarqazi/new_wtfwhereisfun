<!DOCTYPE html>
<html lang="en">
<head>

    <title>{{$organizer->name}} Profile</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5T5VGHN');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131495965-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-131495965-1');
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/Bootstrap/dist/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/Bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('html-social-network/Bootstrap/dist/css/bootstrap-grid.css')}}">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom-style.css')}}">
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

                @foreach($eventLocations as $location)
                    <div class="col-md-4">
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