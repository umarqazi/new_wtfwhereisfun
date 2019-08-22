@extends('layouts.master')
@section('title', "Search Events")
@section('content')
    <div class="container">
        <div class="main-top-padding">
            <div class="public-event-listing">
                <div class="row">
                    <div class="col-md-12 find-events">
                        <form class="explore-search-form" id="search-events-form" action="{{url('search-events')}}" method="post" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="es-field-wrap clearfix">
                                <div class="header_search_container">
                                    <div class="clm first_clm">
                                        <i class="fa fa-search"></i>
                                        <input type="text" class="fld" placeholder="Search Events" id="search-events" onkeyup="searchEvents(event)" onblur="hideSearchResults()" name="search_events"/>
                                        <ul class="search_dropdown" style="display: none;">
                                        </ul>
                                    </div>
                                    <div class="clm">
                                        <i class="fa fa-send"></i>
                                        <input type="text" class="fld" id="search-location" name="location" value="{{$city}}">
                                    </div>
                                    <div class="clm">
                                        <i class="fa fa-calendar"></i>
                                        <input type='text' class="fld event-start-date" id="search-start-date" name="event-start-date"/>
                                    </div>
                                    <div class="clm">
                                        <i class="fa fa-calendar"></i>
                                        <input type='text' class="fld event-end-date" id="search-end-date" name="event-end-date"/>
                                    </div>
                                    <div class="clm third_clm">
                                        <button class="search_btn" type="submit" id="search-button">Search</button>
                                    </div>
                                </div>
                            </div><!-- /.es-field-wrap -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .checked {
            color: orange;
        }
    </style>
    <script type="text/javascript" src="{{asset('js/custom/search.js')}}"></script>
@endsection