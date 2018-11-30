@extends("layouts.master")
@section("title", "Event Listings")
@section("content")
    <div id="" class="main_content">
        <div class="container">
            <div class="col-md-12">
                <a href="javascript:void(0)" onclick="window.history.back()" class=" pull-right btn btn-raised btn-default waves-effect back-button1">Back</a>
                <h2>Manage Events</h2>
                <ul class="nav nav-tabs eventsTabs">
                    <li class="active"><a data-toggle="tab" href="#home">LIVE {{count($liveEventLocations)}}</a></li>
                    <li><a data-toggle="tab" href="#menu1">DRAFT {{count($draftEventLocations)}}</a></li>
                    <li><a data-toggle="tab" href="#menu2">PAST {{count($pastEventLocations)}}</a></li>
                    <li><a data-toggle="tab" href="#menu3">All {{count($allEventLocations)}}</a></li>
                </ul>

                <div class="eventsSearch">

                </div>

            </div>


            <div class="col-md-9">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div id="home_tab">
                            @if(count($liveEventLocations))
                                @foreach($liveEventLocations as $location)
                                    <div class="eventListing">
                                        <div class="img-holder">
                                            @if(!empty($location->event->header_image))
                                                @php
                                                    $img = $location->event->directory.$location->event->header_image;
                                                @endphp
                                            @else
                                                @php
                                                    $img = asset('img/dummy.jpg');
                                                @endphp
                                            @endif
                                            <img src="{{$img}}">
                                        </div>
                                        @php
                                            $encryptedId = $location->event->encrypted_id;
                                        @endphp
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list"><a class="btn" href="{{url('events/'.$location->encrypted_id.'/dashboard')}}">Manage</a></li>
                                                <li class='dropdown action-list'>
                                                    <button href='javascript:void(0);' class='dropdown-toggle btn rounded-border' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                                                        More <i class='zmdi zmdi-more-vert'></i>
                                                    </button>
                                                    <ul class='dropdown-menu pull-right'>
                                                        <li><a href="{{url('events/'.$encryptedId.'/edit')}}">Edit Event</a></li>
                                                        @if($location->event->hot_deal()->exists())
                                                            <li><a href='javascript:void(0);' class='remove_hot' onclick='deleteHotDeal(this)' id="{{$encryptedId}}">Remove Deal</a></li>
                                                        @else
                                                            <li><a href='javascript:void(0);' onclick='createHotDeal(this)' id="{{$encryptedId}}">Make Hot Deal</a></li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.$encryptedId.'/'.$location->encrypted_id)}}">{{$location->event->title}}</a>
                                            </div>
                                            <p>
                                                <i class="fa fa-calendar"></i> {{$location->starting->format('D, d M Y')}} - {{$location->ending->format('D, d M Y')}}</p>
                                            <p>
                                                <i class="fa fa-clock-o"></i> {{$location->starting->format('g:i A')}}  - {{$location->ending->format('g:i A')}}
                                            </p>
                                            <p><i class="fa fa-map-marker"></i>
                                                {{$location->location}}
                                            </p>
                                            @if($location->event->hot_deal()->exists())
                                                <div class="tooltipContainer hotDeal">
                                                    <i class="fa fa-tag"></i> Hot Deal
                                                    <div class="customToolTip">
                                                        <p>
                                                            <strong>Starts At : </strong><span>{{$location->event->hot_deal->start_time->format('D, M Y g:i A')}}</span><br>
                                                            <strong>Ends At : </strong><span>{{$location->event->hot_deal->end_time->format('D, M Y g:i A')}}</span><br>
                                                            <strong>Discount : </strong><span>{{$location->event->hot_deal->discount}}%</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            <p class="green"><i class="fa fa-circle"></i>Live</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div id="menu1" class="tab-pane fade">
                        <div id="menu_draft">
                            @if(count($draftEventLocations))
                                @foreach($draftEventLocations as $location)
                                    <div class="eventListing">
                                        <div class="img-holder">
                                            @if(!empty($location->event->header_image))
                                                @php
                                                    $img = $location->event->directory.$location->event->header_image;
                                                @endphp
                                            @else
                                                @php
                                                    $img = asset('img/dummy.jpg');
                                                @endphp
                                            @endif
                                            <img src="{{$img}}">
                                        </div>
                                        @php
                                            $encryptedId = $location->event->encrypted_id;
                                        @endphp
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list">
                                                    <a class="btn" href="{{url('events/'.$encryptedId.'/dashboard')}}">Manage</a>
                                                </li>
                                                <li class="action-list">
                                                    <a class="btn" href="{{url('events/'.$encryptedId.'/edit')}}">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.$encryptedId.'/'.$location->encrypted_id)}}">{{$location->event->title}}</a>
                                            </div>

                                            <p>
                                                <i class="fa fa-calendar"></i> {{$location->starting->format('D, d M Y')}} - {{$location->ending->format('D, d M Y')}}
                                            </p>
                                            <p>
                                                <i class="fa fa-clock-o"></i> {{$location->starting->format('g:i A')}}  - {{$location->ending->format('g:i A')}}
                                            </p>
                                            <p><i class="fa fa-map-marker"></i>
                                                {{$location->location}}
                                            </p>

                                            <p class="yellows"><i class="fa fa-circle"></i>Draft</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div id="menu_past">
                            @if(count($pastEventLocations))
                                @foreach($pastEventLocations as $location)
                                    <div class="eventListing">
                                        <div class="img-holder">
                                            @if(!empty($location->event->header_image))
                                                @php
                                                    $img = $location->event->directory.$location->event->header_image;
                                                @endphp
                                            @else
                                                @php
                                                    $img = asset('img/dummy.jpg');
                                                @endphp
                                            @endif
                                            <img src="{{$img}}">
                                        </div>
                                        @php
                                            $encryptedId = $location->event->encrypted_id;
                                        @endphp
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list">
                                                    <a class="btn" href="{{url('events/'.$encryptedId.'/dashboard')}}">Manage</a>
                                                </li>
                                                <li class="action-list">
                                                    <a class="btn" href="{{url('events/'.$encryptedId.'/edit')}}">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.$encryptedId.'/'.$location->encrypted_id)}}">{{$location->event->title}}</a>
                                            </div>
                                            <p>
                                                <i class="fa fa-calendar"></i> {{$location->starting->format('D, d M Y')}} - {{$location->ending->format('D, d M Y')}}</p>
                                            <p>
                                                <i class="fa fa-clock-o"></i> {{$location->starting->format('g:i A')}}  - {{$location->ending->format('g:i A')}}
                                            </p>
                                            <p><i class="fa fa-map-marker"></i>
                                                {{$location->location}}
                                            </p>
                                            <p class="yellows"><i class="fa fa-circle"></i>Past</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div id="menu3" class="tab-pane fade">
                        <div id="menu_past">
                            @if(count($allEventLocations))
                                @foreach($allEventLocations as $location)
                                    <div class="eventListing">
                                        <div class="img-holder">
                                            @if(!empty($location->event->header_image))
                                                @php
                                                    $img = $location->event->directory.$location->event->header_image;
                                                @endphp
                                            @else
                                                @php
                                                    $img = asset('img/dummy.jpg');
                                                @endphp
                                            @endif
                                            <img src="{{$img}}">
                                        </div>
                                        @php
                                            $encryptedId = $location->event->encrypted_id;
                                        @endphp
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list">
                                                    <a class="btn" href="{{url('events/'.$encryptedId.'/edit')}}">Manage</a>
                                                </li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.$encryptedId.'/'.$location->encrypted_id)}}">{{$location->event->title}}</a>
                                            </div>
                                            <p>
                                                <i class="fa fa-calendar"></i> {{$location->starting->format('D, d M Y')}} - {{$location->ending->format('D, d M Y')}}</p>
                                            <p>
                                                <i class="fa fa-clock-o"></i> {{$location->starting->format('g:i A')}}  - {{$location->ending->format('g:i A')}}
                                            </p>
                                            <p><i class="fa fa-map-marker"></i>
                                                {{$location->location}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-3">
            </div>

        </div>
    </div>

    <!-- Default Size -->
    <div class="modal fade" id="make-hot-deal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="make-hot" class="serialize-form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Make Hot Deal</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Discount</label>
                            <input type="number" class="form-control" id="" name="discount" placeholder="Discount in Percentage" required="" min="1" max="100">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Hours</label>
                            <select name="hours" required>
                                <option disabled selected>Select Hours</option>
                                <option value="12">12 Hours</option>
                                <option value="24">24 Hours</option>
                                <option value="36">36 Hours</option>
                                <option value="48">48 Hours</option>
                                <option value="60">60 Hours</option>
                                <option value="72">72 Hours</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn  btn-default save-hot modal-btn">Save Hot Deal</button>
                        <button type="button" class="btn btn-default modal-btn waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                    <input type="hidden" class="event_id" name="event_id">
                </form>
            </div>
        </div>
    </div>

@endsection