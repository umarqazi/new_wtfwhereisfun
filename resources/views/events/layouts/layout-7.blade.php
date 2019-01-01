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
@endsection