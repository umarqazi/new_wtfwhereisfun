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
                                            @php
                                                $directory = getDirectory('events', $liveEvent->id);
                                                $img = $directory['web_path'].$liveEvent->header_image;
                                            @endphp
                                            <img src="{{$img}}">
                                        </div>
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                <li class="action-list"><a class="btn" href="{{url('events/'.encrypt_id($liveEvent->id).'/edit')}}">Manage</a></li>
                                            </ul>
                                            <div class="event-title">
                                                <a href="{{url('events/'.encrypt_id($liveEvent->id))}}">{{$liveEvent->title}}</a>
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
                                            @php
                                                $directory = getDirectory('events', $draftEvent->id);
                                                $img = $directory['web_path'].$draftEvent->header_image;
                                            @endphp
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
                                            @php
                                                $directory = getDirectory('events', $pastEvent->id);
                                                $img = $directory['web_path'].$pastEvent->header_image;
                                            @endphp
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
                </div>

            </div>

            <div class="col-md-3">
            </div>

        </div>
    </div>
@endsection