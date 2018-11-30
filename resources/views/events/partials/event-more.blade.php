@if(count($moreEvents))
    <div class="listing-single__related">
        <h3 class="listing-single__related-title">More Listings By {{$event->vendor->first_name}}</h3>
        <div class="row row-clear-lines">
            @foreach($moreEvents as $moreEvent)
                <div class="col-sm-6 col-md-6">
                    <div class="listing_related-item">
                        <a href="{{route('showById', ['id' => $moreEvent->encrypted_id, 'locationId' => $moreEvent->time_locations->first()->encrypted_id ])}}">
                            @if(!empty($moreEvent->header_image))
                                @php
                                    $image     = $moreEvent->directory.$moreEvent->header_image;
                                @endphp
                            @else
                                @php
                                    $image     = asset('img/dummy.jpg');
                                @endphp
                            @endif
                            <div class="listing_related-item__media" style="background-image: url({{$image}})">
                                <img src="{{$image}}" alt="{{$moreEvent->title}}">
                            </div>
                            <div class="listing_related-item__body">
                                <h2 class="listing_related-item__title">{{$moreEvent->title}}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif