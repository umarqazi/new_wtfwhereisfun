@extends('layouts.event-layouts-master')
@section('content')
    <div class="is-desktop bg-color">
        <section id="main">
            <div class="temp_3 listing-single-wrap7">

                <div class="listing-single__hero7 bg-scroll" style="background-image: url({{$directory['web_path'].$event->header_image}})">
                    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.339)"></div>
                </div>

                <div class="listing-single__wrap-header7">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="listing-single__header">
                                    <div class="listing-single__title">
                                        <h1 style="font-size: 30px;">{{$event->title}}</h1>
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
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-push-4">
                            <div class="listing-single event-layout-tabs">
                                <div class="tab tab--2 listing-single__tab">

                                    @include('events.partials.event-layout-tabs')

                                    <div class="tab__content">
                                        <div id="tab-description" class="tab__panel active">
                                            <div class="listing-single__content">
                                                @include('events.partials.event-description')
                                            </div>
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