<!-- ______________________ Start Header __________________ -->
{{-- If it's landing page--}}
@if(url()->current() == url('/'))
    <header id="landing-header" class="header header-secondary">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo-wrap">
                    <a href="{{url('/')}}" class="header-logo">
                        <img src="{{asset('img/logos/stub-logo.png')}}" alt="Logo">
                    </a>
                </div><!-- /.header-logo-wrap -->
                <div class="main-navbar">
                    <div class="menu-toggle">
                         <span class="menu-toggle-icon">
                            <span></span>
                         </span>
                    </div>
                    <div class="main-menu-wrap clearfi">
                        <i class="fa fa-times closeMenu"></i>
                        <ul class="main-menu landing-page-menu">
                            {{--<li><a href="#"> Features</a></li>--}}
                            {{--<li><a href="#">Customers</a></li>--}}
                            {{--<li><a href="#">Pricing</a></li>--}}
                            <li><a href="#">Find Events</a></li>
                            <li><a href="{{url('events/create')}}">Host Events</a></li>
                            @if (Auth::check())
                                @php $user = Auth::user() @endphp
                                @if(!empty($user->profile_thumbnail))
                                    @php
                                        $image = $user->directory.$user->profile_thumbnail;
                                    @endphp
                                @else
                                    @php
                                        $image = asset('img/default-148.png');
                                    @endphp
                                @endif
                                <li>
                                    <img src="{{$image}}">
                                    <span>{{$user->first_name}}</span>
                                    <div class="custom-dropdown-menu">
                                        <ul>
                                            @if($user->hasRole('vendor') || $user->hasRole('organizer'))
                                                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                                                <li><a href="{{url('profile')}}">Profile</a></li>
                                                <li><a href="{{url('events/create')}}">Create Events</a></li>
                                                <li><a href="{{url('my-events')}}">My Events</a></li>
                                                <li><a href="{{url('my-tickets')}}">My Tickets</a></li>
                                                <li><a href="{{url('organizers/create')}}">Manage Organizers</a></li>
                                                <li><a href="{{url('complaints')}}">Complaints</a></li>
                                                <li><a href="{{url('')}}">Help</a></li>
                                                <li><a href="{{url('logout')}}">Logout</a></li>
                                            @else
                                                <li><a href="{{url('profile')}}">Profile</a></li>
                                                <li><a href="{{url('my-tickets')}}">My Tickets</a></li>
                                                <li><a href="{{url('disputes')}}">Disputes</a></li>
                                                <li><a href="{{url('')}}">Help</a></li>
                                                <li><a href="{{url('logout')}}">Logout</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li><a class="login-main-btn" href="" data-toggle="modal" data-target="#login">Login</a></li>
                                <li class="current-menu-item"><a href="" data-toggle="modal" data-target="#signup">Register</a></li>
                            @endif
                        </ul>
                    </div>
                </div><!-- /.left-navbar -->
            </div><!-- /.header-inner -->
        </div>
    </header>
@else
    {{--If its some dashboard view or some static view--}}
    {{-- Dashboard Menu Bar --}}
    <header id="header" class="header header-secondary">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo-wrap">
                    <a href="{{url('/')}}" class="header-logo">
                        <img src="{{asset('img/logos/stub-logo.png')}}" alt="Logo">
                    </a>
                </div><!-- /.header-logo-wrap -->
                <div class="main-navbar">
                    <div class="menu-toggle">
                         <span class="menu-toggle-icon">
                            <span></span>
                         </span>
                    </div>
                    <div class="main-menu-wrap clearfi">
                        <ul class="main-menu">
                            <li><a href="#">Find Events</a></li>
                            <li><a href="{{url('events/create')}}">Host Events</a></li>
                            @if (Auth::check())
                                @php $user = Auth::user() @endphp
                                @if(!empty($user->profile_thumbnail))
                                    @php
                                        $image = $user->directory.$user->profile_thumbnail;
                                    @endphp
                                @else
                                    @php
                                        $image = asset('img/default-148.png');
                                    @endphp
                                @endif
                                <li>
                                    <img src="{{$image}}">
                                    <span>{{$user->first_name}}</span>
                                    <div class="custom-dropdown-menu">
                                        <ul>
                                            @if( $user->hasRole('vendor') || $user->hasRole('organizer'))
                                                <li><a href="{{url('dashboard')}}">Dashboard</a></li>
                                                <li><a href="{{url('profile')}}">Profile</a></li>
                                                <li><a href="{{url('events/create')}}">Create Event</a></li>
                                                <li><a href="{{url('my-events')}}">My Events</a></li>
                                                <li><a href="{{url('my-tickets')}}">My Tickets</a></li>
                                                <li><a href="{{url('organizers/create')}}">Manage Organizers</a></li>
                                                <li><a href="{{url('complaints')}}">Complaints</a></li>
                                                <li><a href="{{url('')}}">Help</a></li>
                                                <li><a href="{{url('logout')}}">Logout</a></li>
                                            @else
                                                <li><a href="{{url('profile')}}">Profile</a></li>
                                                <li><a href="{{url('my-tickets')}}">My Tickets</a></li>
                                                <li><a href="{{url('disputes')}}">Disputes</a></li>
                                                <li><a href="{{url('')}}">Help</a></li>
                                                <li><a href="{{url('logout')}}">Logout</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li><a class="login-main-btn" href="" data-toggle="modal" data-target="#login">Login</a></li>
                                <li class="current-menu-item"><a href="" data-toggle="modal" data-target="#signup">Register</a></li>
                            @endif
                        </ul>
                    </div>
                </div><!-- /.left-navbar -->
            </div><!-- /.header-inner -->
        </div>
    </header>

@endif