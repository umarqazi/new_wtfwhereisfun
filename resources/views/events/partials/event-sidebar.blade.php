<div class="col-md-4 @if(!is_null($event->layout) && $event->layout->sidebar_position == 'left') col-md-pull-8 @else listgo-single-listing-sidebar-wrapper @endif">

    <div class="@if(is_null($event->layout) || $event->layout->sidebar_color == 'white') sidebar-background--light  @else sidebar-background @endif">
        <div id="wiloke_about-3" class="widget widget_about widget_author widget_text">

            <div class="widget_author__header">
                <a href="https://listgo.wiloke.com/author/dianelucas/">
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
                        <span class="widget_author__role"> <span class="member-item__role" style="color: rgb(250, 34, 118)">
<img src="{{asset('img/admin.png')}}" alt="Badge">
Organizer </span>
</span>
                    </div>
                </a>
            </div>
            <div class="account-subscribe">
                <span class="followers"><a href="https://listgo.wiloke.com/info/?mode=followers&amp;user=10"><span class="count">1</span> Followers</a></span>
            </div>
            <div class="widget_author__content">
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
                <div class="widget_author__social">
                    @if(!empty($event->organizer->facebook))<a href="{{$event->organizer->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a> @endif
                    @if(!empty($event->organizer->twitter))<a href="{{$event->organizer->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a> @endif
                    @if(!empty($event->organizer->google))<a
                            href="{{$event->organizer->google}}" target="_blank"><i class="fa fa-google-plus"></i></a> @endif
                    @if(!empty($event->organizer->timbler))<a href="{{$event->organizer->timbler}}" target="_blank"><i class="fa fa-tumblr"></i></a> @endif
                    @if(!empty($event->organizer->instagram))<a href="{{$event->organizer->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a> @endif
                    @if(!empty($event->organizer->linkedin))<a href="{{$event->organizer->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a> @endif
                </div>
                @if(!empty($event->organizer->organizer_url))
                    <div class="widget_author__link">
                        <a href="{{$event->organizer->website}}" target="_blank">Visit Website</a>
                    </div>
                @endif
            </div>
        </div>


        <div id="wiloke_price_segment-5" class="widget widget wiloke_price_segment">
            <h4 class="widget_title"><i class="fa fa-map-marker"></i><span class="active"></span>Time & Locations</h4>
            <div class="organizer-dropdown mapDropdown">
                <span class="active">Select Event Time<i class="fa fa-chevron-down"></i></span>
                <ul class="list" style="display: none;">
                    @if(count($locations))
                        @foreach($locations as $location)
                            <li>
                                <a href="{{url('events/').encrypt_id($event->id)}}">{{$location->starting->format('g:i A')}} - {{$location->ending->format('g:i A')}}</a>
                            </li>
                        @endforeach
                    @else
                        <li>
                            <a href="">No time has entered</a>
                        </li>
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
                    <span class="wiloke_price-range__price">{{$event->discount}}</span>
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

            {{--@if(count($event->tags))--}}
                {{--<div class="wiloke_price-range">--}}
                    {{--<span class="active"></span> Event Tags--}}
                    {{--<span class="wiloke_price-range__price">--}}
                        {{--@foreach($event->tags as $tags)--}}
                            {{--{{$tag->name}}--}}
                        {{--@endforeach--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--@endif--}}
        </div>

        <div id="wiloke_gallery-3" class="widget widget widget_author_gallery"><h4 class="widget_title"><i class="icon_camera_alt"></i> Gallery</h4> <div class="widget_author-gallery">
                <ul class="popup-gallery">
                    @php $eventImagesCount = count($event->images) @endphp
                    @for($i = 0; $i < $eventImagesCount; $i++)
                        @if($i < 3)
                            <li class="">
                                <a class="bg-scroll fancybox" data-fancybox="gallery" href="{{$directory['web_path'].$event->images[$i]->name}}" style="background-image: url({{$directory['web_path'].$event->images[$i]->name}})">
                                </a>
                            </li>
                        @elseif($i == 4)
                            <li class="author__gallery-plus">
                                <a class="bg-scroll fancybox" data-fancybox="gallery" href="{{$directory['web_path'].$event->images[$i]->name}}" style="background-image: url({{$directory['web_path'].$event->images[$i]->name}})">
                                    <span class="count">+9</span>
                                </a>
                            </li>
                        @else
                            <li class="hidden">
                                <a class="bg-scroll fancybox" data-fancybox="gallery" href="{{$directory['web_path'].$event->images[$i]->name}}" style="background-image: url({{$directory['web_path'].$event->images[$i]->name}})">
                                </a>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

    </div>
</div>