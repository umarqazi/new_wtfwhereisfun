@extends('layouts.event-layouts-master')
@section('content')
    <section id="main">
        <div class="listing-single-wrap5">
            <div class="listing-single__hero5 bg-scroll" style="background-image: url({{$directory['web_path'].$event->header_image}})">
                <div class="overlay" style="background-color: rgba(0, 0, 0, 0.357)"></div>
            </div>


            <div class="listing-single__wrap-header5">
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
                                <a href="" class="">@if(!empty($event->category_id)){{$event->category->name}} @else Other @endif</a>
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
                                            <p>{!! $event->description !!}</p>
                                            <div class="tiled-gallery type-rectangular" data-original-width="1200" >
                                                <div class="gallery-row" style="width: 750px; height: 108px;" data-original-width="1200" data-original-height="174">
                                                    <div class="gallery-group images-1" style="width: 166px; height: 108px;" data-original-width="266" data-original-height="174">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large" >
                                                            @if(count($event->images) >= 1)
                                                            <img src="{{$directory['web_path'].$event->images[0]->name}}" width="262" height="170" data-original-width="262" data-original-height="170" style="width: 162px; height: 104px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 196px; height: 108px;" data-original-width="315" data-original-height="174">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 2)
                                                            <img src="{{$directory['web_path'].$event->images[1]->name}}" width="311" height="170" data-original-width="311" data-original-height="170" style="width: 192px; height: 104px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 228px; height: 108px;" data-original-width="365" data-original-height="174">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 3)
                                                            <img src="{{$directory['web_path'].$event->images[2]->name}}" width="361" height="170" data-original-width="361" data-original-height="170" style="width: 224px; height: 104px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="gallery-group images-1" style="width: 158px; height: 108px;" data-original-width="254" data-original-height="174">
                                                        <div class="tiled-gallery-item tiled-gallery-item-large">
                                                            @if(count($event->images) >= 4)
                                                            <img src="{{$directory['web_path'].$event->images[3]->name}}" width="250" height="170" data-original-width="250" data-original-height="170" style="width: 154px; height: 104px;">
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