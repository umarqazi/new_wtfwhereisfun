@extends('layouts.event-layouts-master')
@section('content')
    <section id="main">
        <div class="listing-single-wrap6">

            <div class="listing-single__hero6 bg-scroll" style="background-image: url({{asset('img/bg-header-listing6.jpg')}})">
                <div class="container">
                    <div class="listing-single__inner-hero6">
                        <div class="listing-single__img-hero6 bg-scroll" style="background-image: url({{$directory['web_path'].$event->header_image}})">
                            <img src="{{$directory['web_path'].$event->header_image}}" alt="Event Header Image">
                            <div class="overlay" style="background-color: rgba(0, 0, 0, 0.2)"></div>
                        </div>
                        <div class="listing-single__wrap-header6">
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
                                    <a href="" class="">@if(!empty($event->category_id)){{$event->category->name}} @else Other @endif
                                    </a>
                                </div>
                                <div class="listing-single__status">
                                    <span class="listing-single__label">Status</span>
                                    <span class="ongroup">
                                         @if($event->is_approved)
                                            <span class="onclose green">Approved</span>
                                        @else
                                            <span class="onclose red">Not Approved</span>
                                        @endif
                                        <span class="onopensin yellow">Opens at 07:00:AM today</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="listing-single">
                            <div class="tab tab--2 listing-single__tab">

                                @include('events.partials.event-layout-tabs')

                                <div class="tab__content">
                                    <div id="tab-description" class="tab__panel active">
                                        <div class="listing-single__content">
                                            <p>
                                                {!! $event->description !!}
                                            </p>
                                            <p>&nbsp;</p>
                                            <div class="tiled-gallery type-rectangular" data-original-width="1200">
                                                <div class="gallery-row" style="width: 750px; height: 591px;" data-original-width="1200" data-original-height="946">
                                                    <div class="gallery-group images-2" style="width: 355px; height: 591px;" data-original-width="568" data-original-height="946">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 1)
                                                            <img src="{{$directory['web_path'].$event->images[0]->name}}" width="564" height="564" data-original-width="564" data-original-height="564" style="width: 351px; height: 351px;">
                                                            @endif
                                                        </div>
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 2)
                                                            <img src="{{$directory['web_path'].$event->images[1]->name}}" width="564" height="374" data-original-width="564" data-original-height="374" style="width: 351px; height: 232px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 395px; height: 591px;" data-original-width="632" data-original-height="946">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large" >
                                                            @if(count($event->images) >= 3)
                                                            <img src="{{$directory['web_path'].$event->images[2]->name}}" width="628" height="942" data-original-width="628" data-original-height="942" style="width: 391px; height: 587px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gallery-row" style="width: 750px; height: 334px;" data-original-width="1200" data-original-height="535">
                                                    <div class="gallery-group images-1" style="width: 500px; height: 334px;" data-original-width="801" data-original-height="535">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 4)
                                                            <img src="{{$directory['web_path'].$event->images[3]->name}}" width="797" height="531" data-original-width="797" data-original-height="531" style="width: 496px; height: 330px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-2" style="width: 249px; height: 334px;" data-original-width="399" data-original-height="535">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large" >
                                                            @if(count($event->images) >= 5)
                                                            <img src="{{$directory['web_path'].$event->images[4]->name}}" width="395" height="264" data-original-width="395" data-original-height="264" style="width: 245px; height: 163px;">
                                                            @endif
                                                        </div>
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 6)
                                                            <img src="{{$directory['web_path'].$event->images[5]->name}}" width="395" height="263" data-original-width="395" data-original-height="263" style="width: 245px; height: 162px;">
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
