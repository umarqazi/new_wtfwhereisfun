@extends('layouts.master')
@section('title', " Create Event")
@section('content')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <div class="main-top-padding">
        <div class="event-color-status">
            <div><span class="foo calendar-grey"></span>Past Events</div>
            <div><span class="foo calendar-green"></span>Live Events</div>
            <div><span class="foo calendar-yellow"></span>Draft Events</div>
        </div>
        <div class="events-calendar">
            <div class="calendar">
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="event-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Event Details</h4>
                </div>
                <div class="modal-body">
                    <div class="ticket_description_wrapper">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="img-holder">
                                    <img src="">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="info">
                                    <div class="description_details">
                                        <h4 class="title"><strong></strong></h4>
                                    </div>
                                    <div class="description_details">
                                        <p class="location"><strong></strong></p>
                                    </div>
                                    <div class="description_details">
                                        <p class="date"><strong></strong></p>
                                        <p class="time"><strong></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a type="button" class="btn btn-sm event-view-btn rounded-border" href="">View Event</a>
                    <button type="button" class="btn btn-sm rounded-border" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var emptyImg = "{{asset('img/dummy.jpg')}}";
    </script>
    <script src="{{asset('js/custom/calendar.js')}}" type="text/javascript"></script>
@endsection