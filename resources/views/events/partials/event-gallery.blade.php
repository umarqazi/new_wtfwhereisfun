
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