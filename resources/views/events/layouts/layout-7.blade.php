@extends('layouts.event-layouts-master')
@section('content')

    <div class="template7-bg" style="background: url({{$directory['web_path'].$event->header_image}})">
        <div class="inner-img">
            <img src="{{$directory['web_path'].$event->header_image}}">
        </div>
    </div>

    <section id="main" class="template-7-main">
        <div class="listing-single__wrap-header8">
            <div class="container">
                <div class="listing-single__header">
                    <div class="listing-single__title">
                        <h1>{{$event->title}}</h1>
                    </div>
                    <div class="listing-single__meta">
                        <div class="listing-single__date">
                            <span class="listing-single__label">Posted on</span>
                            {{monthDateYearFromat($event->created_at)}}
                        </div>
                        <div class="listing__meta-cat">
                            <span class="listing-single__label">Category</span>
                            <a href="" class="">@if(!empty($event->category_id)){{$event->category->name}} @else Other @endif
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="listing-single-wrap1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="listing-single">
                            <div class="tab tab--2 listing-single__tab">

                                @include('events.partials.event-layout-tabs')

                                <div class="tab__content">
                                    <div id="tab-description" class="tab__panel active">
                                        <div class="listing-single__content">
                                            <p>{!! $event->description !!}</p>
                                            <div class="tiled-gallery type-rectangular" data-original-width="1200" data-carousel-extra="{&quot;blog_id&quot;:1,&quot;permalink&quot;:&quot;https:\/\/listgo.wiloke.com\/listing\/chilean-patagonia\/&quot;,&quot;likes_blog_id&quot;:132612991}" itemscope="" itemtype="http://schema.org/ImageGallery">
                                                <div class="gallery-row" style="width: 710px; height: 306px;"  >
                                                    <div class="gallery-group images-2" style=" width: 250px; height: 306px;" >
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 1)
                                                                <img src="{{$directory['web_path'].$event->images[0]->name}}" class="layout-img-1" style="width: 246px; height: 134px;" width="420" height="230">
                                                            @endif
                                                        </div>
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 2)
                                                                <img src="{{$directory['web_path'].$event->images[1]->name}}" style="width: 246px; height: 164px;" width="420" height="280">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 459px; height: 306px;" >
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 3)
                                                                <img src="{{$directory['web_path'].$event->images[2]->name}}" width="772" height="514" style="width: 455px; height: 302px;" class="layout-img-">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="gallery-row" style="width: 710px; height: 320px;">
                                                    <div class="gallery-group images-1" style="width: 479px; height: 320px;" data-original-width="810" data-original-height="541">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 4)
                                                                <img src="{{$directory['web_path'].$event->images[3]->name}}" width="806" height="537" style="width: 475px; height: 316px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-2" style="width: 230px; height: 320px;" data-original-width="390" data-original-height="541">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 5)
                                                                <img src="{{$directory['web_path'].$event->images[4]->name}}" width="386" height="243" style="width: 226px; height: 142px;">
                                                            @endif
                                                        </div>
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 6)
                                                                <img src="{{$directory['web_path'].$event->images[5]->name}}" width="386" height="290" data-original-width="386" data-original-height="290" style="width: 226px; height: 169px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('events.partials.event-description')
                                        </div>
                                    </div>

                                    <div id="event-tickets" class="tab__panel default-status has-single-map">
                                        @include('events.partials.event-tickets')
                                    </div>

                                    <div id="time-locations" class="tab__panel default-status">
                                        @include('events.partials.event-time-location')
                                    </div>

                                </div>
                            </div>

                            @include('events.partials.event-more')

                        </div>
                    </div>
                    @include('events.partials.event-sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection