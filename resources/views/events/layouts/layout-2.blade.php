@extends('layouts.event-layouts-master')
@section('content')
    <section id="main">
        <div class="listing-single-hero bg-scroll" style="background-image: url({{$directory['web_path'].$event->header_image}})">
            <div class="listing-single-hero__inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
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
                                        <a href="#" class="">
                                            @if(!empty($event->category_id)){{$event->category->name}} @else Other @endif
                                        </a>
                                    </div>

                                    <div class="listing-single__status">
                                        <span class="listing-single__label">Status</span>
                                        <span class="ongroup">
                                        @if($event->is_approved)
                                                <span class="onopen green">Approved</span>
                                            @else
                                                <span class="onopen red">Not Approved</span>
                                            @endif
                                    </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay" style="background-color:rgba(0, 0, 0, 0.3)"></div>
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
                                            <div class="tiled-gallery type-rectangular" data-original-width="1200">
                                                <div class="gallery-row" style="width: 750px; height: 332px;" data-original-width="1200" data-original-height="532">
                                                    <div class="gallery-group images-1" style="width: 501px; height: 332px;" data-original-width="802" data-original-height="532">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 1)
                                                                <img data-orig-size="1280,847" src="{{$directory['web_path'].$event->images[0]->name}}" width="798" height="528" data-original-width="798" data-original-height="528" style="width: 497px; height: 328px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-2" style="width: 248px; height: 332px;" data-original-width="398" data-original-height="532">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large" >
                                                            @if(count($event->images) >= 2)
                                                                <img src="{{$directory['web_path'].$event->images[1]->name}}" width="394" height="263" data-original-width="394" style="width: 244px; height: 162px;">
                                                            @endif
                                                        </div>
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 3)
                                                                <img src="{{$directory['web_path'].$event->images[2]->name}}" width="394" height="261" data-original-width="394" style="width: 244px; height: 161px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gallery-row" style="width: 750px; height: 250px;" data-original-width="1200" data-original-height="401"> <div class="gallery-group images-1" style="width: 375px; height: 250px;" data-original-width="600" data-original-height="401">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 4)
                                                                <img src="{{$directory['web_path'].$event->images[3]->name}}" width="596" height="397" data-original-width="596" data-original-height="397" style="width: 371px; height: 246px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 375px; height: 250px;" data-original-width="600" data-original-height="401">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 5)
                                                                <img src="{{$directory['web_path'].$event->images[4]->name}}" width="596" height="397" data-original-width="596" data-original-height="397" title="post_196" alt="post_196" style="width: 371px; height: 246px;">
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