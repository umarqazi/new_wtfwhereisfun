<div class="event-description-content">
    {!! $event->description !!}
</div>

<div class="event-gallery">
@if((!$event->images->isEmpty()))
    @if(count($event->images) == 1)
        <div class="row gallery_row">
            <div class="col-md-12">
                <a href="{{$directory['web_path'].$event->images[0]->name}}" class="fancybox" data-fancybox="gallery">
                    <div class="gallery_thumbnail">
                        <div class="mask"></div>
                        <i class="fa fa-search"></i>
                        <img src="{{$directory['web_path'].$event->images[0]->name}}" class="main-img" />
                    </div>
                </a>
            </div>
        </div>
    @else
        <div class="row gallery_row gallery_row2">
            @foreach($event->images as $img)
                <div class="col-md-6">
                    <a href="{{$directory['web_path'].$img->name}}" class="fancybox" data-fancybox="gallery">
                        <div class="gallery_thumbnail">
                            <div class="mask"></div>
                            <i class="fa fa-search"></i>
                            <img src="{{$directory['web_path'].$img->name}}" class="main-img" />
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

@endif
</div>

<div class="event-additional-description">
    @if(!empty($locations))
        <div class="location_map" id="location_map">
            <div style="width: 100%; height: 250px;">
                {!! Mapper::render() !!}
            </div>
        </div>
    @endif

    @if(!empty($event->additional_message))
        <div class="addtional-msg">
            <h5>Additional Message</h5>
            <p>{{$event->additional_message}}</p>
        </div>
    @endif

    @if(!is_null($event->refund_policy))
        <div class="refund-policy">
            <h5>Refund Policy</h5>
            <p>{{$event->refund_policy->text}}</p>
        </div>
    @endif
</div>