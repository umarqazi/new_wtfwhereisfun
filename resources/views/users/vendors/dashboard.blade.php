@extends('layouts.master')
@section('title', "Dashboard")
<!--Dashboard Content-->
@section('content')
    <section class="content home dashboard-main main-top-padding">
        <div class="main-top-padding">
            <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Dashboard
                        <small class="text-muted"></small>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="event-filters col-xs-12">
                    <div class="event-filters-left">
                        <div class="event-button-bar">
                            <div class="button-bar active" id = "7" onclick="changeEventReports(this, 7)">
                                <span>Past 7 days</span>
                            </div>
                            <div class="button-bar" id="30" onclick="changeEventReports(this, 30)">
                                <span>Past 30 days</span>
                            </div>
                            <div class="button-bar" id="365" onclick="changeEventReports(this, 365)">
                                <span>Year to date</span>
                            </div>
                        </div>
                        <div class="event-button-bar">
                            <!-- react-empty: 120 -->
                            <div class="button-bar active">
                                <span>Show all</span>
                            </div>
                            <div>
                                <div class="button-bar custom-events false">
                                    Filter events
                                    <div class="custom-events-filter-icon">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="container-fluid">
            <div class="row clearfix social-widget">
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 total-events">
                    <div class="tasks_report card info-box-2 hover-zoom-effect behance-widget shadow">
                        <div class="icon"><i class="zmdi zmdi-cocktail"></i></div>
                        <div class="content">
                            <div class="text">Total Events</div>
                            <div class="number total-events-count">{{$pastWeek['count']}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-6 total-earnings">
                    <div class="tasks_report card info-box-2 hover-zoom-effect behance-widget shadow">
                        <div class="icon"><i class="zmdi zmdi-money"></i></div>
                        <div class="content">
                            <div class="text">Total Earnings</div>
                            <div class="number total-earnings-sum">${{$pastWeek['totalEarning']}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <input type="hidden" id="weekCount" value="{{$pastWeek['count']}}">
            <input type="hidden" id="monthCount" value="{{$pastMonth['count']}}">
            <input type="hidden" id="yearCount" value="{{$pastYear['count']}}">
            <input type="hidden" id="weekEarning" value="{{$pastWeek['totalEarning']}}">
            <input type="hidden" id="monthEarning" value="{{$pastMonth['totalEarning']}}">
            <input type="hidden" id="yearEarning" value="{{$pastYear['totalEarning']}}">
        </div>
    </section>

    <script src="{{asset('js/custom/dashboard.js')}}"></script>
@endsection