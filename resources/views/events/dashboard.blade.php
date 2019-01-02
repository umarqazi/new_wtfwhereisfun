@extends('layouts.event-dashboard')
@section('title', "Event Dashboard :: StubGuys")
@section('content')

    <div class="page_wrapper event-dashboard">
        @include('events.partials.event-dashboard-sidebar')
        <section class="content home">
            @include('events.partials.event-dashboard-top-details')
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <h2>Revenue Report</h2>
                            <div class="body">
                                <div class="row">
                                    <div class="col-4">
                                        <h4 class="m-b-0">${{$weekRevenue['totalRevenue']}}</h4>
                                        <p class="text-muted">This Week <small class="m-l-10">(Total Orders : {{$weekRevenue['count']}})</small></p>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="m-b-0">${{$monthRevenue['totalRevenue']}}</h4>
                                        <p class="text-muted">This Month <small class="m-l-10">(Total Orders : {{$monthRevenue['count']}})</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="sparkline" data-type="line" data-spot-Radius="0" data-highlight-Spot-Color="rgb(63, 81, 181)" data-highlight-Line-Color="#222"
                                 data-min-Spot-Color="rgb(233, 30, 99)" data-max-Spot-Color="rgb(63, 81, 181)" data-spot-Color="rgb(63, 81, 181, 0.7)"
                                 data-width="100%" data-height="50px" data-line-Width="0" data-line-Color="rgba(63, 81, 181, 0)"
                                 data-fill-Color="#fcefcb"> 1,2,3,1,4,3,6,4,4,1 </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                        <div class="card tasks_report">
                            <div class="body">
                                <input type="text" class="knob total-revenue" value="{{$totalRevenue['revenuePercentage']}}" data-width="90" data-height="90" data-thickness="0.2" data-fgColor="#00adef" readonly>
                                <h6 class="m-t-20">Total Revenue</h6>
                                <small class="displayblock">{{$totalRevenue['revenuePercentage']}}% Tickets Sold <i class="zmdi zmdi-trending-up"></i></small>
                                <div class="sparkline m-t-30" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#00adef">3,5,7,9,5,1,4,5,6,8</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <ul class="row profile_state list-unstyled">
                                <li class="col-lg-3 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-calendar col-amber"></i>
                                        <h4>{{$analytics['totalViews']}}</h4>
                                        <span>Event Views</span><br>
                                        <span class="badge badge-info">Total Views</span>
                                    </div>
                                </li>
                                <li class="col-lg-3 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-comment-text col-red"></i>
                                        <h4>{{$analytics['monthViews']}}</h4>
                                        <span>Event Views</span><br>
                                        <span class="badge badge-info">This Month</span>
                                    </div>
                                </li>
                                <li class="col-lg-3 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-account text-success"></i>
                                        <h4>{{$analytics['weekViews']}}</h4>
                                        <span>Event Views</span><br>
                                        <span class="badge badge-info">This Week</span>
                                    </div>
                                </li>
                                <li class="col-lg-3 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-thumb-up col-blue"></i>
                                        <h4>365</h4>
                                        <span>Organizer Profile Views</span>
                                        <span class="badge badge-warning">Total Views</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12 col-lg-12">
                        <div class="card visitors-map">
                            <div class="header">
                                <h2>Visitors Statistics</h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-7 col-md-12">
                                        <div id="analytics-map-markers" class="jvector-map"></div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Country</th>
                                                    <th>Sessions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($analytics['locationAnalytics']->count() > 0)
                                                    @foreach($analytics['locationAnalytics'] as $location)
                                                        <tr>
                                                            <td>{{$location['country']}}</td>
                                                            <td>{{$location['sessions']}}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td>No Data Available</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card ">
                            <div class="header">
                                <h2>Recent Messages</h2>
                            </div>
                            <div class="body">
                                <ul class="inbox-widget list-unstyled clearfix">
                                    @foreach($disputes as $dispute)
                                        <li class="inbox-inner">
                                            <a href="{{url('disputes/'.$dispute->encrypted_id)}}">
                                                <div class="inbox-item">
                                                    <div class="inbox-img">
                                                        @if(!empty($dispute->user->profile_thumbnail))
                                                            @php
                                                                $img = $dispute->user->directory.$dispute->user->profile_thumbnail;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $img = asset('img/default-148.png');
                                                            @endphp
                                                        @endif
                                                        <img src="{{$img}}" alt="User Image">
                                                    </div>
                                                    <div class="inbox-item-info">
                                                        <p class="author">{{$dispute->user->first_name}} {{$dispute->user->last_name}}</p>
                                                        <p class="inbox-message">{!! str_limit($dispute->message, 25, '...') !!}</p>
                                                        <p class="inbox-date">{{monthDateYearFromat($dispute->created_at)}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card activities">
                            <div class="header">
                                <h2>Activities</h2>
                            </div>
                            <div class="body">
                                <div class="streamline b-l b-accent">
                                    @foreach($activity as $order)
                                        <div class="sl-item">
                                            <div class="sl-content">
                                                <div class="text-muted-dk">{{monthDateYearFromat($order->created_at)}}</div>
                                                <p><a href="" class="text-info">Order placed by {{$order->user->first_name}} on {{$order->ticket->name}}</a></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2>Browser Usage</h2>
                                <span class="badge badge-primary">Coming Soon</span>
                            </div>
                            <div class="body">
                                <div id="donut_chart" class="dashboard-donut-chart"></div>
                                <table class="table m-t-15 m-b-0">
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Chrome</td>
                                        <td>6985 Views</td>
                                        <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Other</td>
                                        <td>2697 Views</td>
                                        <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Safari</td>
                                        <td>3597 Views</td>
                                        <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Firefox</td>
                                        <td>2145 Views</td>
                                        <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Opera</td>
                                        <td>1854 Views</td>
                                        <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix social-widget">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="card info-box-2 hover-zoom-effect facebook-widget">
                            <div class="icon"><i class="zmdi zmdi-facebook"></i></div>
                            <div class="content">
                                <div class="text">Like</div>
                                <div class="number">123</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="card info-box-2 hover-zoom-effect instagram-widget">
                            <div class="icon"><i class="zmdi zmdi-instagram"></i></div>
                            <div class="content">
                                <div class="text">Followers</div>
                                <div class="number">231</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="card info-box-2 hover-zoom-effect twitter-widget">
                            <div class="icon"><i class="zmdi zmdi-twitter"></i></div>
                            <div class="content">
                                <div class="text">Followers</div>
                                <div class="number">31</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="card info-box-2 hover-zoom-effect google-widget">
                            <div class="icon"><i class="zmdi zmdi-google"></i></div>
                            <div class="content">
                                <div class="text">Like</div>
                                <div class="number">254</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="card info-box-2 hover-zoom-effect linkedin-widget">
                            <div class="icon"><i class="zmdi zmdi-linkedin"></i></div>
                            <div class="content">
                                <div class="text">Followers</div>
                                <div class="number">2510</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                        <div class="card info-box-2 hover-zoom-effect behance-widget">
                            <div class="icon"><i class="zmdi zmdi-behance"></i></div>
                            <div class="content">
                                <div class="text">Project</div>
                                <div class="number">121</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="event-oraganizer">
                                    <h1>Your Links</h1>
                                    <p><strong>Your Organizer URL: </strong>
                                        @if(!empty($eventOrganizer->organizer_url))
                                            <a href="{{ url('/') }}{{'/organizer/'.$eventOrganizer->organizer_url}}" id="organizer-old-url">{{ url('/') }}{{'/organizer/'.$eventOrganizer->organizer_url}}</a>
                                        @else
                                            <a href="{{url('/').'/organizer/'.$eventOrganizer->slug}}" id="organizer-old-url">{{url('/').'/organizer/'.$eventOrganizer->slug}}</a>
                                        @endif

                                        <input type="hidden" name="organizer_id" id="organizer-id" value="{{$eventOrganizer->id}}">
                                        <input type="hidden" name="base_url" value="{{url('/')}}">
                                        <strong>  - [ <a href="javascript:void(0)" data-toggle="collapse" data-target="#changeOrganizer-url">Change</a> ]</strong>
                                    </p>
                                    <div id="changeOrganizer-url" class="collapse">
                                        <p>Create your own Personalized Organizer URL</p>
                                        @if(!empty($eventOrganizer->organizer_url))
                                            <strong class="pre_url">{{url('/').'/organizer/'}}</strong>
                                            <input type="text" id="organizer_url" name="organizer_url" value="@php echo substr($eventOrganizer->organizer_url, 0, strpos($eventOrganizer->organizer_url, '-')); @endphp" placeholder="your-own-url" /><strong>-{{$eventOrganizer->encrypted_id}}</strong>
                                        @else
                                            <strong class="pre_url">{{url('/').'/organizer/'}}</strong>
                                            <input type="text" id="organizer_url" name="organizer_url" placeholder="your-own-url" />
                                        @endif
                                        <button type="button" class="btn btn-sm rounded-border" onclick="updateUrl('organizer')">Save</button>
                                    </div>

                                    <p><strong>Your Event URL: </strong>
                                        @if(!empty($event->slug))
                                            <a href="{{ url('/').'events/'.$event->slug.'/'.$location->encrypted_id }}" id="event-old-url">{{ url('/').'/events/'.$event->slug.'/'.$location->encrypted_id }}</a>
                                        @else
                                            <a href="{{url('/').'/events/'.$event->encrypted_id.'/'.$location->encrypted_id}}" id="event-old-url">{{url('/').'/events/'.$event->encrypted_id.'/'.$location->encrypted_id}}</a>
                                        @endif

                                        <input type="hidden" name="event_id" id="event-id" value="{{$event->encrypted_id}}">
                                        <input type="hidden" name="base_url" value="{{url('/')}}">
                                        <input type="hidden" name="locaiton_id" id="location-id" value="{{$location->encrypted_id}}">
                                        <strong>  - [ <a href="javascript:void(0)" data-toggle="collapse" data-target="#event-url">Change</a> ]</strong>
                                    </p>
                                    <div id="event-url" class="collapse">
                                        <p>Create your own Personalized Event URL</p>
                                        @if(!empty($event->slug))
                                            <strong class="pre_url">{{url('/').'/events/'}}</strong>
                                            <input type="text" id="event-url-field" name="event_url"
                                                   value="{{substr($event->slug, 0, strpos($event->slug, '-'))}}" placeholder="your-own-url" />
                                            <strong>-{{$event->encrypted_id.'/'.$location->encrypted_id}}</strong>
                                        @else
                                            <strong class="pre_url">{{url('/').'/events/'}}</strong>
                                            <input type="text" id="event-url-field" name="event_url" placeholder="your-own-url" />
                                            <strong>-{{$event->encrypted_id.'/'.$location->encrypted_id}}</strong>
                                        @endif
                                        <button type="button" class="btn btn-sm rounded-border btn-save-event-url" onclick="updateUrl('event')">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <div class="row clearfix event-dashboard-footer">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <p class="m-b-0"><a href="{{url('/')}}" target="black">Copyright © Wiloke.com •Tel: +98-76543210</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <script>
        var markers = {{$analytics['locationAnalytics']}};
        var countryInfo = [];
        if(markers.length != 0){
            $.each(markers, function() {
                countryInfo.push({latLng: [this.latitude,this.longitude], name : this.country});
            });
        }
    </script>
    <script src="{{asset('js/eventpage/dashboard-analytics.js')}}"></script>
    <script src="{{asset('js/eventpage/events.js')}}"></script>


@endsection
