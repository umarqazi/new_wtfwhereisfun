@extends('layouts.event-layouts-master')
@section('content')

    <div class="bg-color">
        <section id="main">
            <div class="listing-single-wrap8">
                <div class="listing-single__wrap-header8">
                    <div class="container">
                        <div class="listing-single__header">
                            <div class="listing-single__title">
                                <h1>{{$event->title}}</h1>
                                @if($event->is_approved)
                                    <span class="listing__icon-notif claimed" data-tooltip="Claimed">
                                        <i class="fa fa-check-circle"></i>
                                    </span>
                                @endif
                            </div>
                            <div class="listing-single__meta">
                                <div class="listing-single__date">
                                    <span class="listing-single__label">Posted on</span>
                                    {{monthDateYearFromat($event->created_at)}}
                                </div>
                                <div class="listing__meta-cat">
                                    <span class="listing-single__label">Category</span>
                                    <a href="" class="">
                                        @if(!empty($event->category_id)){{$event->category->name}} @else Other @endif
                                    </a>
                                </div>

                                <div class="listing-single__status">
                                    <span class="listing-single__label">Status</span>
                                    <span class="ongroup">
                                        @if($event->is_approved)
                                            <span class="onclose green">Live</span>
                                        @else
                                            <span class="onclose red">Not Approved</span>
                                        @endif
                                        <span class="onopensin yellow">Opens at 06:30:AM today</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="listing-single">

                                <div class="listing-single__img-hero8 bg-scroll" style="background-image: url({{$directory['web_path'].$event->header_image}})">
                                    <img src="{{$directory['web_path'].$event->header_image}}" alt="Mickies Dairy Bar">
                                    <div class="overlay" style="background-color: rgba(0, 108, 255, 0.4)"></div>
                                </div>

                                <div class="tab tab--2 listing-single__tab">

                                    @include('events.partials.event-layout-tabs')

                                    <div class="tab__content">
                                        <div id="tab-description" class="tab__panel active">
                                            <div class="listing-single__content">
                                                <p>{!! $event->description !!}</p>
                                                <p>&nbsp;</p>
                                                <div class="tiled-gallery type-rectangular" data-original-width="1200">
                                                    <div class="gallery-row" style="width: 710px; height: 349px;" data-original-width="1200" data-original-height="590">
                                                        <div class="gallery-group images-1" style="width: 464px; height: 349px;" data-original-width="785" data-original-height="590">
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 1)
                                                                <img src="{{$directory['web_path'].$event->images[0]->name}}" width="781" height="586" data-original-width="781" data-original-height="586" style="width: 460px; height: 345px;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="gallery-group images-2" style="width: 245px; height: 349px;" data-original-width="415" data-original-height="590">
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 2)
                                                                <img src="{{$directory['web_path'].$event->images[1]->name}}" width="411" height="274" data-original-width="411" data-original-height="274" style="width: 241px; height: 160px;">
                                                                @endif
                                                            </div>
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 3)
                                                                <img src="{{$directory['web_path'].$event->images[2]->name}}" width="411" height="308" data-original-width="411" data-original-height="308" alt="post_342" style="width: 241px; height: 180px;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gallery-row" style="width: 710px; height: 123px;" data-original-width="1200" data-original-height="208">
                                                        <div class="gallery-group images-1" style="width: 183px; height: 123px;" data-original-width="310" data-original-height="208">
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 4)
                                                                <img src="{{$directory['web_path'].$event->images[3]->name}}" width="306" height="204" data-original-width="306" data-original-height="204" style="width: 179px; height: 119px;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="gallery-group images-1" style="width: 159px; height: 123px;" data-original-width="269" data-original-height="208">
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 5)
                                                                <img src="{{$directory['web_path'].$event->images[4]->name}}" width="265" height="204" data-original-width="265" data-original-height="204" style="width: 155px; height: 119px;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="gallery-group images-1" style="width: 183px; height: 123px;" data-original-width="310" data-original-height="208">
                                                            <div class="tiled-gallery-item tiled-gallery-item-large">
                                                                @if(count($event->images) >= 6)
                                                                <img src="{{$directory['web_path'].$event->images[5]->name}}" width="306" height="204" data-original-width="306" data-original-height="204" style="width: 179px; height: 119px;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="gallery-group images-1" style="width: 184px; height: 123px;" data-original-width="311" data-original-height="208">
                                                            <div class="tiled-gallery-item tiled-gallery-item-large" >
                                                                <img src="" width="307" height="204" data-original-width="307" data-original-height="204" style="width: 180px; height: 119px;">
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
    </div>
@endsection
