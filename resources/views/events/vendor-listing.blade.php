@extends("layouts.master")
@section("title", "Event Listings")
@section("content")
    <div id="" class="main_content">
        <div class="container">
            <div class="col-md-12">
                <a href="javascript:void(0)" onclick="window.history.back()" class=" pull-right btn btn-raised btn-default waves-effect back-button1">Back</a>
                <h2>Manage Events</h2>
                <ul class="nav nav-tabs eventsTabs">
                    <li class="active"><a data-toggle="tab" href="#home">LIVE {{count($liveEvents)}}</a></li>
                    <li><a data-toggle="tab" href="#menu1">DRAFT {{count($draftEvents)}}</a></li>
                    <li><a data-toggle="tab" href="#menu2">PAST {{count($pastEvents)}}</a></li>
                    <li><a data-toggle="tab" href="#menu3">All {{count($allEvents)}}</a></li>
                </ul>

                <div class="eventsSearch">

                </div>

            </div>


            <div class="col-md-9">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div id="home_tab">
                            @if(count($liveEvents))
                                @foreach($liveEvents as $liveEvent)
                                    <div class="eventListing">
                                        <div class="img-holder">
                                            @if(!empty($liveEvent->header_image))
                                                @php
                                                    $directory = getDirectory('events', $liveEvent->id);
                                                    $img = $directory['web_path'].$liveEvent->header_image;
                                                @endphp
                                            @else
                                                @php
                                                    $img = asset('img/dummy.jpg');
                                                @endphp
                                            @endif
                                            <img src="{{$img}}">
                                        </div>
                                        <div class="info">
                                            @php
                                                $liveEventId = encrypt_id($liveEvent->id);
                                            @endphp
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list"><a class="btn" href="{{url('events/'.$liveEventId.'/edit')}}">Manage</a></li>
                                                <li class='dropdown action-list'>
                                                    <button href='javascript:void(0);' class='dropdown-toggle btn rounded-border' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                                                        More <i class='zmdi zmdi-more-vert'></i>
                                                    </button>
                                                    <ul class='dropdown-menu pull-right'>
                                                        @if($liveEvent->hot_deal()->exists())
                                                            <li><a href='javascript:void(0);' class='remove_hot' onclick='deleteHotDeal(this)' id="{{$liveEventId}}">Remove Deal</a></li>
                                                        @else
                                                            <li><a href='javascript:void(0);' onclick='createHotDeal(this)' id="{{$liveEventId}}">Make Hot Deal</a></li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.$liveEventId)}}">{{$liveEvent->title}}</a>
                                            </div>
                                            @if(count($liveEvent->time_locations))
                                                <p>
                                                    <i class="fa fa-calendar"></i> {{$liveEvent->time_locations->first()->starting->format('D, M Y')}} - {{$liveEvent->time_locations->first()->ending->format('D, M Y')}}</p>
                                                <p>
                                                    <i class="fa fa-clock-o"></i> {{$liveEvent->time_locations->first()->starting->format('g:i A')}}  - {{$liveEvent->time_locations->first()->ending->format('g:i A')}}
                                                </p>
                                                <p><i class="fa fa-map-marker"></i>
                                                    {{$liveEvent->time_locations->first()->location}}
                                                </p>
                                            @endif
                                            @if($liveEvent->hot_deal()->exists())
                                                <div class="tooltipContainer hotDeal">
                                                    <i class="fa fa-tag"></i> Hot Deal
                                                    <div class="customToolTip">
                                                        <p>
                                                            <strong>Starts At : </strong><span>{{$liveEvent->hot_deal->start_time->format('D, M Y g:i A')}}</span><br>
                                                            <strong>Ends At : </strong><span>{{$liveEvent->hot_deal->end_time->format('D, M Y g:i A')}}</span><br>
                                                            <strong>Discount : </strong><span>{{$liveEvent->hot_deal->discount}}%</span>
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
                            @if(count($draftEvents))
                                @foreach($draftEvents as $draftEvent)
                                    <div class="eventListing">
                                        <div class="img-holder">
                                            @if(!empty($draftEvent->header_image))
                                                @php
                                                    $directory = getDirectory('events', $draftEvent->id);
                                                    $img = $directory['web_path'].$draftEvent->header_image;
                                                @endphp
                                            @else
                                                @php
                                                    $img = asset('img/dummy.jpg');
                                                @endphp
                                            @endif
                                            <img src="{{$img}}">
                                        </div>
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list">
                                                    <a class="btn" href="{{url('events/'.encrypt_id($draftEvent->id).'/edit')}}">Manage</a>
                                                </li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.encrypt_id($draftEvent->id))}}">{{$draftEvent->title}}</a>
                                            </div>
                                            @if(empty($draftEvent->time_locations))
                                                <p>
                                                    <i class="fa fa-calendar"></i> {{$draftEvent->time_locations->first()->starting->format('D, M Y')}} - {{$draftEvent->time_locations->first()->ending->format('D, M Y')}}
                                                </p>
                                                <p>
                                                    <i class="fa fa-clock-o"></i> {{$draftEvent->time_locations->first()->starting->format('g:i A')}}  - {{$draftEvent->time_locations->first()->ending->format('g:i A')}}
                                                </p>
                                                <p><i class="fa fa-map-marker"></i>
                                                    {{$draftEvent->time_locations->first()->location}}
                                                </p>
                                            @endif
                                            <p class="yellows"><i class="fa fa-circle"></i>Draft</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div id="menu_past">
                            @if(count($pastEvents))
                                @foreach($pastEvents as $pastEvent)
                                    <div class="eventListing">
                                        <div class="img-holder">
                                            @if(!empty($pastEvent->header_image))
                                                @php
                                                    $directory = getDirectory('events', $pastEvent->id);
                                                    $img = $directory['web_path'].$pastEvent->header_image;
                                                @endphp
                                            @else
                                                @php
                                                    $img = asset('img/dummy.jpg');
                                                @endphp
                                            @endif
                                            <img src="{{$img}}">
                                        </div>
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list">
                                                    <a class="btn" href="{{url('events/'.encrypt_id($pastEvent->id).'/edit')}}">Manage</a>
                                                </li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.encrypt_id($pastEvent->id))}}">{{$pastEvent->title}}</a>
                                            </div>
                                            @if(count($pastEvent->time_locations))
                                                <p>
                                                    <i class="fa fa-calendar"></i> {{$pastEvent->time_locations->first()->starting->format('D, M Y')}} - {{$pastEvent->time_locations->first()->ending->format('D, M Y')}}</p>
                                                <p>
                                                    <i class="fa fa-clock-o"></i> {{$pastEvent->time_locations->first()->starting->format('g:i A')}}  - {{$pastEvent->time_locations->first()->ending->format('g:i A')}}
                                                </p>
                                                <p><i class="fa fa-map-marker"></i>
                                                    {{$pastEvent->time_locations->first()->location}}
                                                </p>
                                            @endif
                                            <p class="yellows"><i class="fa fa-circle"></i>Past</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div id="menu3" class="tab-pane fade">
                        <div id="menu_past">
                            @if(count($allEvents))
                                @foreach($allEvents as $event)
                                    <div class="eventListing">
                                        <div class="img-holder">
                                            @if(!empty($event->header_image))
                                                @php
                                                    $directory = getDirectory('events', $event->id);
                                                    $img = $directory['web_path'].$event->header_image;
                                                @endphp
                                            @else
                                                @php
                                                    $img = asset('img/dummy.jpg');
                                                @endphp
                                            @endif
                                            <img src="{{$img}}">
                                        </div>
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list">
                                                    <a class="btn" href="{{url('events/'.encrypt_id($event->id).'/edit')}}">Manage</a>
                                                </li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.encrypt_id($event->id))}}">{{$event->title}}</a>
                                            </div>
                                            @if(count($event->time_locations))
                                                <p>
                                                    <i class="fa fa-calendar"></i> {{$event->time_locations->first()->starting->format('D, M Y')}} - {{$event->time_locations->first()->ending->format('D, M Y')}}</p>
                                                <p>
                                                    <i class="fa fa-clock-o"></i> {{$event->time_locations->first()->starting->format('g:i A')}}  - {{$event->time_locations->first()->ending->format('g:i A')}}
                                                </p>
                                                <p><i class="fa fa-map-marker"></i>
                                                    {{$event->time_locations->first()->location}}
                                                </p>
                                            @endif
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
                            <input type="number" class="form-control" id="" name="discount" placeholder="Discount in Percentage" required="">
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