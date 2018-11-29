<div class="event-dashboard-block">
    <div class="clm_left">
        <h2>{{$event->title}}</h2>
        <p>{!! str_limit($event->description, 60, '...') !!}</p>
        <p>
            <i class="fa fa-calendar green"></i> {{$location->starting->format('D, d M Y')}} - {{$location->ending->format('D, d M Y')}}</p>
        <p>
            <i class="fa fa-clock-o green"></i> {{$location->starting->format('g:i A')}}  - {{$location->ending->format('g:i A')}}
        </p>
        <p><i class="fa fa-map-marker green"></i>
            {{$location->location}}
        </p>
    </div>
    @php
        $eventLink = route('showById', ['id' => $event->encrypted_id, 'locationId' => $location->encrypted_id ]);
    @endphp
    <div class="clm_right">
        <a class="btn btn-sm rounded-border" href="{{$eventLink}}">View Event</a>
    </div>
</div>

<div class="event_tabs rounded-border">
    <li>
        <a href="{{url('events/'.$event->encrypted_id.'/edit')}}" target="_blank">EDIT</a>
    </li>
    <li>
        <a href="{{$eventLink}}" target="_blank">DESIGN</a>
    </li>
    <li>
        <a href="javascript:void(0);" target="_blank">MANAGE</a>
    </li>
</div>