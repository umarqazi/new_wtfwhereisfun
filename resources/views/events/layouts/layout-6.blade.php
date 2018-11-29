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
                                            @include('events.partials.event-description')
                                        </div>
                                    </div>

                                    <div id="event-tickets" class="tab__panel default-status has-single-map">
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
@endsection
