@extends('layouts.event-dashboard')
@section('title', "My Tickets :: Where's the fun")
@section('content')

    <div class="page_wrapper">
        @include('events.partials.event-dashboard-sidebar')
        <section class="content home">
            @include('events.partials.event-dashboard-top-details')
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="card tasks_report">
                            <div class="body">
                                <input type="text" class="knob dial1" value="66" data-width="90" data-height="90" data-thickness="0.2" data-fgColor="#00ced1" readonly>
                                <h6 class="m-t-20">Satisfaction Rate</h6>
                                <small class="displayblock">47% Average <i class="zmdi zmdi-trending-up"></i></small>
                                <div class="sparkline m-t-30" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#00ced1">5,8,3,4,8,9,7,2,9,5</div>
                                <span class="badge badge-primary">Coming Soon</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="card tasks_report">
                            <div class="body">
                                <input type="text" class="knob dial2" value="26" data-width="90" data-height="90" data-thickness="0.2" data-fgColor="#ffa07a" readonly>
                                <h6 class="m-t-20">Orders Panding</h6>
                                <small class="displayblock">13% Average <i class="zmdi zmdi-trending-down"></i></small>
                                <div class="sparkline m-t-30" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffa07a">9,5,1,5,4,8,7,6,3,4</div>
                                <span class="badge badge-primary">Coming Soon</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="card tasks_report">
                            <div class="body">
                                <input type="text" class="knob dial3" value="76" data-width="90" data-height="90" data-thickness="0.2" data-fgColor="#8fbc8f" readonly>
                                <h6 class="m-t-20">Productivity Goal</h6>
                                <small class="displayblock">75% Average <i class="zmdi zmdi-trending-up"></i></small>
                                <div class="sparkline m-t-30" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#8fbc8f">6,4,9,8,6,5,4,5,3,2</div>
                                <span class="badge badge-primary">Coming Soon</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                        <div class="card tasks_report">
                            <div class="body">
                                <input type="text" class="knob dial4" value="{{$totalRevenue['revenuePercentage']}}" data-width="90" data-height="90" data-thickness="0.2" data-fgColor="#00adef" readonly>
                                <h6 class="m-t-20">Total Revenue</h6>
                                <small class="displayblock">{{$totalRevenue['revenuePercentage']}}% Tickets Sold <i class="zmdi zmdi-trending-up"></i></small>
                                <div class="sparkline m-t-30" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#00adef">3,5,7,9,5,1,4,5,6,8</div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <input type="text" class="knob dial4" value="{{$totalRevenue['revenuePercentage']}}" data-width="90" data-height="90" data-thickness="0.2" data-fgColor="#00adef" readonly>
                                <h6 class="m-t-20">Total Revenue</h6>
                                <small class="displayblock">{{$totalRevenue['revenuePercentage']}}% Tickets Sold <i class="zmdi zmdi-trending-up"></i></small>
                                <div class="sparkline m-t-30" data-type="bar" data-width="97%" data-height="30px" data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#00adef">3,5,7,9,5,1,4,5,6,8</div>
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
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                        <ul class="dropdown-menu slideUp ">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div id="donut_chart" class="dashboard-donut-chart"></div>
                                <table class="table m-t-15 m-b-0">
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Chrome</td>
                                        <td>6985</td>
                                        <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Other</td>
                                        <td>2697</td>
                                        <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Safari</td>
                                        <td>3597</td>
                                        <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Firefox</td>
                                        <td>2145</td>
                                        <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Opera</td>
                                        <td>1854</td>
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
                                        @if(!$eventOrganizer->organizer_url)
                                            <a href="{{ url('/') }}{{'/organizer/'.$eventOrganizer->slug}}" id="old-url">{{ url('/') }}{{'/organizer/'.$eventOrganizer->slug}}</a>
                                        @else
                                            <a href="{{url('/')}}/organizer/{{$eventOrganizer->organizer_url}}" id="old-url">{{url('/')}}/organizer/{{$eventOrganizer->organizer_url}}</a>
                                        @endif

                                        <input type="hidden" name="organizer_id" value="{{$eventOrganizer->id}}">
                                        <input type="hidden" name="base_url" value="{{url('/')}}">
                                        <strong>  - [ <a href="javascript:void(0)" data-toggle="collapse" data-target="#changeOrganizer-url">Change</a> ]</strong>
                                    </p>
                                    <div id="changeOrganizer-url" class="collapse">
                                        <p>Create your own Personalized Organizer URL for ABC Company.</p>
                                        @if(!$eventOrganizer->organizer_url)
                                            <strong class="pre_url">{{url('/')}}/organizer/</strong><input type="text" id="organizer_url" name="organizer_url" placeholder="helloWorld" />
                                        @else
                                            <strong class="pre_url">{{url('/')}}/organizer/</strong><input type="text" id="organizer_url" name="organizer_url" value="@php echo substr($eventOrganizer->organizer_url, 0, strpos($eventOrganizer->organizer_url, '-')); @endphp" placeholder="helloWorld" /><strong>-{{$eventOrganizer->encrypted_id}}</strong>
                                        @endif
                                        <button type="button" class="btn btn-save-organizer-url">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <div class="row clearfix">
                    <div class="col-lg-9 col-md-8">
                        <div class="card product-report">
                            <div class="header">
                                <h2>Annual Report <small>Description text here...</small></h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="row clearfix m-b-15">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="icon l-amber"><i class="zmdi zmdi-chart-donut"></i></div>
                                        <div class="col-in">
                                            <h4 class="counter m-b-0">$4,516</h4>
                                            <small class="text-muted m-t-0">Sales Report</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="icon l-turquoise"><i class="zmdi zmdi-chart"></i></div>
                                        <div class="col-in">
                                            <h4 class="counter m-b-0">$6,481</h4>
                                            <small class="text-muted m-t-0">Annual Revenue </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="icon l-parpl"><i class="zmdi zmdi-card"></i></div>
                                        <div class="col-in">
                                            <h4 class="counter m-b-0">$3,915</h4>
                                            <small class="text-muted m-t-0">Total Profit</small>
                                        </div>
                                    </div>
                                </div>
                                <div id="area_chart" class="graph"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="card top-report">
                                    <div class="body">
                                        <h3 class="m-t-0">50.5 Gb <i class="zmdi zmdi-trending-up float-right"></i></h3>
                                        <p class="text-muted">Traffic this month</p>
                                        <div class="progress">
                                            <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                        </div>
                                        <small>Change 5%</small>
                                        <span class="badge badge-primary">Coming Soon</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="card top-report">
                                    <div class="body">
                                        <h3 class="m-t-0">1,600 <i class="zmdi zmdi-trending-up float-right"></i></h3>
                                        <p class="text-muted">New Feedbacks</p>
                                        <div class="progress">
                                            <div class="progress-bar l-blush" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                        </div>
                                        <small>Change 15%</small>
                                        <span class="badge badge-primary">Coming Soon</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card top-report">
                                    <div class="body">
                                        <h3 class="m-t-0">26.8% <i class="zmdi zmdi-trending-down float-right"></i></h3>
                                        <p class="text-muted">Server Load</p>
                                        <div class="progress">
                                            <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width:32%;"></div>
                                        </div>
                                        <small>Change 17%</small>
                                        <span class="badge badge-primary">Coming Soon</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <ul class="row profile_state list-unstyled">
                                <li class="col-lg-2 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-camera col-amber"></i>
                                        <h4>2,365</h4>
                                        <span>Shots View</span>
                                        <span class="badge badge-primary">Coming Soon</span>
                                    </div>
                                </li>
                                <li class="col-lg-2 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-thumb-up col-blue"></i>
                                        <h4>365</h4>
                                        <span>Likes</span>
                                        <span class="badge badge-primary">Coming Soon</span>
                                    </div>
                                </li>
                                <li class="col-lg-2 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-comment-text col-red"></i>
                                        <h4>65</h4>
                                        <span>Comments</span>
                                        <span class="badge badge-primary">Coming Soon</span>
                                    </div>
                                </li>
                                <li class="col-lg-2 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-account text-success"></i>
                                        <h4>2,055</h4>
                                        <span>Profile Views</span>
                                        <span class="badge badge-primary">Coming Soon</span>
                                    </div>
                                </li>
                                <li class="col-lg-2 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-desktop-mac text-info"></i>
                                        <h4>3,159</h4>
                                        <span>Website View</span>
                                        <span class="badge badge-primary">Coming Soon</span>
                                    </div>
                                </li>
                                <li class="col-lg-2 col-md-4 col-6">
                                    <div class="body">
                                        <i class="zmdi zmdi-attachment text-warning"></i>
                                        <h4>2,365</h4>
                                        <span>Attachment</span>
                                        <span class="badge badge-primary">Coming Soon</span>
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
                                <span class="badge badge-primary">Coming Soon</span>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-7 col-md-12">
                                        <div id="world-map-markers" class="jvector-map"></div>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Contrary</th>
                                                    <th>2017</th>
                                                    <th>2017</th>
                                                    <th>Change</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>USA</td>
                                                    <td>2,009</td>
                                                    <td>3,591</td>
                                                    <td>7.01% <i class="zmdi zmdi-trending-up text-success"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>India</td>
                                                    <td>1,129</td>
                                                    <td>1,361</td>
                                                    <td>3.01% <i class="zmdi zmdi-trending-up text-success"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>Canada</td>
                                                    <td>2,009</td>
                                                    <td>2,901</td>
                                                    <td>9.01% <i class="zmdi zmdi-trending-up text-success"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>954</td>
                                                    <td>901</td>
                                                    <td>5.71% <i class="zmdi zmdi-trending-down text-warning"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>Germany</td>
                                                    <td>594</td>
                                                    <td>500</td>
                                                    <td>6.11% <i class="zmdi zmdi-trending-down text-warning"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>UK</td>
                                                    <td>1,500</td>
                                                    <td>1,971</td>
                                                    <td>8.50% <i class="zmdi zmdi-trending-up text-success"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>Other</td>
                                                    <td>4,236</td>
                                                    <td>4,591</td>
                                                    <td>9.15% <i class="zmdi zmdi-trending-up text-success"></i></td>
                                                </tr>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <p class="m-b-0">© 2017 Nexa Admin by <a href="http://thememakker.com/" target="black">ThemeMakker</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <script src="{{asset('js/organizer.js')}}"></script>
@endsection
