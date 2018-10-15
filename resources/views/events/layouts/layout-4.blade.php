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

                                            @include('events.partials.event-gallery')

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