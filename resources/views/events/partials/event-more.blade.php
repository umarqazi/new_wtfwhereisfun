@if(count($moreEvents))
    <div class="listing-single__related">
        <h3 class="listing-single__related-title">More Listings By {{$event->vendor->first_name}}</h3>
        <div class="row row-clear-lines">
            @foreach($moreEvents as $moreEvent)
                <div class="col-sm-6 col-md-6">
                    <div class="listing_related-item">
                        <a href="{{url('events/'.encrypt_id($moreEvent->id))}}">
                            @php
                                $directory = getDirectory('events', $moreEvent->id);
                                $image     = $directory['web_path'].$moreEvent->header_image;
                            @endphp
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