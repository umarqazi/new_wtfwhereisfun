<div class="col-md-4 @if(!is_null($event->layout) && $event->layout->sidebar_position == 'left') col-md-pull-8 @else listgo-single-listing-sidebar-wrapper @endif">

    <div class="@if(is_null($event->layout) || $event->layout->sidebar_color == 'white') sidebar-background--light  @else sidebar-background @endif">
        <div id="wiloke_price_segment-3" class="widget widget wiloke_price_segment custom-ticket-btn">
            <button class="btn rounded-border" type="button" data-toggle="modal" data-target="#get-tickets-Modal">Get Tickets</button>
        </div>
        <div id="wiloke_about-3" class="widget widget_about widget_author widget_text">

            <div class="widget_author__header">
                <a href="{{url('organizer/'.$event->organizer->slug)}}">
                    <div class="widget_author__avatar">
                        @if(!is_null($event->organizer) && !empty($event->organizer->thumbnail))
                            @php $organizerDirectory = getDirectory('organizers', $event->organizer->id); @endphp
                            @php $organizerImage = $organizerDirectory['web_path'].$event->organizer->thumbnail @endphp
                        @else
                            @php $organizerImage = asset('img/default-148.png') @endphp
                        @endif
                        <img width="128" height="128" src="{{$organizerImage}}" class="attachment-128x128 size-128x128" alt="" srcset="" sizes="(max-width: 128px) 100vw, 128px" data-orig-size="400,400">
                    </div>
                    <div class="overflow-hidden">
                        <h4 class="widget_author__name">{{$event->organizer->name}}</h4>
                        <span class="widget_author__role">
                            <span class="member-item__role" style="color: rgb(250, 34, 118)">
                                <img src="{{asset('img/admin.png')}}" alt="Badge"> Organizer
                            </span>
                        </span>
                    </div>
                </a>
            </div>
            <div class="account-subscribe">
                <span class="followers"><a href="https://listgo.wiloke.com/info/?mode=followers&amp;user=10"><span class="count">1</span> Followers</a></span>
            </div>

            @if(!empty($event->organizer->facebook) || !empty($event->organizer->twitter) || !empty($event->organizer->google) || !empty($event->organizer->timbler) || !empty($event->organizer->instagram) || !empty($event->organizer->linkedin) || !empty($event->contact) || !empty($event->organizer->organizer_url))
                <div class="widget_author__content">
                    @if(!empty($event->contact) || !empty($event->organizer->organizer_url))
                        <ul class="widget_author__address">
                            @if(!empty($event->contact))
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a href="#">{{$event->contact}}</a>
                                </li>
                            @endif

                            @if(!empty($event->organizer->organizer_url))
                                <li>
                                    <i class="fa fa-globe"></i>
                                    <a href="{{$event->organizer->organizer_url}}" target="_blank">{{$event->organizer->organizer_url}}</a>
                                </li>
                            @endif
                        </ul>
                    @endif
                    @if(!empty($event->organizer->facebook) || !empty($event->organizer->twitter) || !empty($event->organizer->google) || !empty($event->organizer->timbler) || !empty($event->organizer->instagram) || !empty($event->organizer->linkedin))
                        <div class="widget_author__social">
                            @if(!empty($event->organizer->facebook))<a href="{{$event->organizer->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a> @endif
                            @if(!empty($event->organizer->twitter))<a href="{{$event->organizer->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a> @endif
                            @if(!empty($event->organizer->google))<a href="{{$event->organizer->google}}" target="_blank"><i class="fa fa-google-plus"></i></a> @endif
                            @if(!empty($event->organizer->timbler))<a href="{{$event->organizer->timbler}}" target="_blank"><i class="fa fa-tumblr"></i></a> @endif
                            @if(!empty($event->organizer->instagram))<a href="{{$event->organizer->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a> @endif
                            @if(!empty($event->organizer->linkedin))<a href="{{$event->organizer->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a> @endif
                        </div>
                    @endif
                    @if(!empty($event->organizer->organizer_url))
                        <div class="widget_author__link">
                            <a href="{{$event->organizer->website}}" target="_blank">Visit Website</a>
                        </div>
                    @endif
                </div>
            @endif
        </div>


        <div id="wiloke_price_segment-5" class="widget widget wiloke_price_segment time-location">
            <h4 class="widget_title"><i class="fa fa-map-marker"></i><span class="active"></span>Time & Locations</h4>
            <div class="organizer-dropdown">
                <span class="active">{{$eventLocation->starting->format('Y-m-d g:i A')}} - {{$eventLocation->ending->format('Y-m-d g:i A')}}<i class="fa fa-chevron-down"></i></span>
                <ul class="list" style="display: none;">
                    @if(!empty($locations))
                        @foreach($locations as $key => $location)
                            @if($location->id != $eventLocation->id )
                                <li><a href="{{url('events/'.$eventId.'/'.encrypt_id($location->id))}}">{{$location->starting->format('Y-m-d g:i A')}} - {{$location->ending->format('Y-m-d g:i A')}}</a></li>
                            @endif
                        @endforeach
                    @else
                        <li class="active">No time has entered</li>
                    @endif
                </ul>
            </div>
        </div>


        @if(!empty($event->referral_code))
            <div id="wiloke_price_segment-3" class="widget widget wiloke_price_segment">
                <h4 class="widget_title"><i class="icon_currency"></i><span class="active"></span>Discount</h4>
                <div class="wiloke_price-range">
                    <span class="active"></span> Referral Code
                    <span class="wiloke_price-range__price">{{$event->referral_code}}</span>
                </div>

                <div class="wiloke_price-range">
                    <span class="active"></span> Discount
                    <span class="wiloke_price-range__price">{{$event->discount}}%</span>
                </div>
            </div>
        @endif


        @if(count($event->tickets))
            <div id="wiloke_price_segment-3" class="widget widget wiloke_price_segment">
                <h4 class="widget_title"><i class="icon_currency"></i><span class="active"></span>Price Range</h4>
                <div class="wiloke_price-range"><span class="active"></span>${{$event->tickets->min('price')}} - ${{$event->tickets->max('price')}}</div>
            </div>
        @endif

        <div id="wiloke_price_segment-3" class="widget widget wiloke_price_segment">
            <h4 class="widget_title"><i class="icon_info"></i><span class="active"></span>Event Topic</h4>
            @if(!is_null($event->type))
                <div class="wiloke_price-range">
                    <span class="active"></span> Event Type
                    <span class="wiloke_price-range__price">{{$event->type->name}}</span>
                </div>
            @endif

            @if(!is_null($event->topic))
                <div class="wiloke_price-range">
                    <span class="active"></span> Event Topic
                    <span class="wiloke_price-range__price">{{$event->topic->name}}</span>
                </div>
            @endif

        </div>

        @if(!$tags->isEmpty())
            <div id="wiloke_gallery-3" class="widget widget widget_author_gallery">
                <h4 class="widget_title">
                    <i class="icon_tags_alt"></i>Event Tags
                </h4>
                <div class="widget_author-gallery">
                    <p class="tags">
                        @foreach($tags as $tag)
                            <span class="event-tag-name">{{$tag->name}}</span>
                        @endforeach
                    </p>
                </div>
            </div>
        @endif

    </div>
</div>
<div class="modal fade" id="get-tickets-Modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Get Tickets</h4>
            </div>
            <div class="modal-body">
                @include('events.partials.event-tickets')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@if(!$errors->isEmpty())
<script type="text/javascript">
    $(window).on('load',function(){
        $('#get-tickets-Modal').modal('show');
    });
</script>
@endif
