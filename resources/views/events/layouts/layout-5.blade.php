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
                                        <div id="tab-description" class="tab__panel @if($errors->isEmpty()) active @endif">
                                            <div class="listing-single__content">
                                                @include('events.partials.event-description')
                                            </div>
                                        </div>
                                        <div id="event-tickets" class="tab__panel default-status has-single-map @if(!$errors->isEmpty()) active @endif">
                                            @include('events.partials.event-tickets')
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
