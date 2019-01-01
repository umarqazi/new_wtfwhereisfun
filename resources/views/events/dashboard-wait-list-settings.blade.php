@extends('layouts.event-dashboard')
@section('title', "Dashboard :: Wait List Settings")
@section('content')
    <div class="page_wrapper event-dashboard @if(strpos(url()->current(),'admin') == true) admin-view @endif">
        @if(strpos(url()->current(),'admin') == false)
            @include('events.partials.event-dashboard-sidebar')
        @endif
        <section class="content home">
            @include('events.partials.event-dashboard-top-details')
            <form action="{{url('/').'/events/'.$location->encrypted_id.'/dashboard/wait-list-settings-update'}}" id="wait_list_setting_form" method="POST">
                <input type="hidden" name="event_time_location_id" value="{{$location->id}}">
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="POST">
                <h1>Wait List Settings</h1>
                <div class="row">
                    <div class="mt-10 p-10">
                        <div class="col-md-12 mt-10">
                            <label>Enable waitlist:</label>
                        </div>
                        <div class="col-md-12 pl-20">
                            <input type="radio" name="waitlist_check" id="waitlist_enabled" value="1" onchange="toggleEnableContainer(this);" @if(isset($waitList)) checked="" @endif>
                            <label for="waitlist_enabled">Enable</label>
                        </div>
                        <div class="col-md-12 pl-20">
                            <input type="radio" name="waitlist_check" id="waitlist_disabled" value="" onchange="toggleEnableContainer(this);" @if(!isset($waitList)) checked="" @endif>
                            <label for="waitlist_disabled">Disable</label>
                        </div>
                    </div>
                    <div class="enabled_container mt-10 p-10 @if(!isset($waitList)) hidden @endif">
                        <div class="col-md-12 mt-10">
                            <label>Waitlist trigger:</label>
                        </div>
                        <div class="col-md-12 pl-20">
                            <input type="radio" name="triggers_on" value="1" id="sell_out"
                                   @if(isset($waitList))
                                       @if($waitList->triggers_on == 1)
                                            checked=""
                                       @endif
                                   @else
                                        checked=""
                                   @endif
                                   required="">
                            <label for="sell_out">When "{{$event->title}}" sells out</label>
                        </div>
                        <div class="col-md-12 mb-10 pl-20">
                            <input type="radio" name="triggers_on" value="2" id="capacity"
                                   @if(isset($waitList))
                                        @if($waitList->triggers_on == 2)
                                            checked=""
                                        @endif
                                   @else
                                        checked=""
                                   @endif
                                   required="">
                            <label for="capacity">When total event capacity is reached</label>
                        </div>
                        <div class="col-md-12 mt-10">
                            <label for="max_count">Maximum waitlist size:</label>
                        </div>
                        <div class="col-md-12 pl-20">
                            <input type="number" class="rounded-border p-7" maxlength="4" id="max_count" name="max_count" min="1"
                                   @if(isset($waitList))
                                        value="{{$waitList->max_count}}"
                                   @else
                                        value="1"
                                   @endif
                                   onchange="checkInteger(this);" required="">
                            @if ($errors->has('max_count'))
                                <div class="col-md-12 pl-20">
                                    <p class="bold red text-center">{{ $errors->default->first('max_count') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 mb-10 pl-20">
                            <p><small>Zero for unlimited</small></p>
                        </div>
                        <div class="col-md-12 mt-10">
                            <label>Attendee information to collect:</label>
                        </div>
                        <div class="col-md-12 pl-20">
                            <input type="checkbox" class="checkbox" id="collect_name" checked="" name="collect_name" onchange="document.getElementById('collect_name').checked = true;" value="1">
                            <label for="collect_name">Full Name (Required)</label>
                        </div>
                        <div class="col-md-12 pl-20">
                            <input type="checkbox" class="checkbox" id="collect_email" checked=""  name="collect_email" onchange="document.getElementById('collect_email').checked = true;" value="1">
                            <label for="collect_email">Email Address (Required)</label>
                        </div>
                        <div class="col-md-12 mb-10 pl-20">
                            <input type="checkbox" class="checkbox" id="collect_phn" name="collect_phn" value="1"
                               @if(isset($waitList))
                                    @if(!empty($waitList->collect_phn)) checked @endif
                               @endif >
                            <label for="collect_phn">Phone Number</label>
                        </div>
                        <div class="col-md-12 mt-10">
                            <label>Time to respond:</label>
                        </div>
                        <div class="col-md-3 pl-20">
                            <div>Day(s)</div>
                            <input type="number" class="rounded-border p-7" maxlength="4" id="day" min="0" name="time_to_respond_days"
                                   @if(isset($waitList))
                                        value="{{$waitList->time_to_respond_days}}"
                                   @else
                                        value="1"
                                   @endif
                                   required="">
                            @if ($errors->has('time_to_respond_days'))
                                <div class="col-md-12 pl-20">
                                    <p class="bold red text-center">{{ $errors->default->first('time_to_respond_days') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-3 pl-20">
                            <div>Hour(s)</div>
                            <input type="number" class="rounded-border p-7" maxlength="4" id="hour" min="0" max="23" name="time_to_respond_hours"
                                   @if(isset($waitList))
                                        value="{{$waitList->time_to_respond_hours}}"
                                   @else
                                        value="0"
                                   @endif
                                    required="">
                            @if ($errors->has('time_to_respond_hours'))
                                <div class="col-md-12 pl-20">
                                    <p class="bold red text-center">{{ $errors->default->first('time_to_respond_hours') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-3 pl-20">
                            <div>Minute(s)</div>
                            <input type="number" class="rounded-border p-7" maxlength="4" id="minute" min="0" max="59" name="time_to_respond_mins"
                                   @if(isset($waitList))
                                        value="{{$waitList->time_to_respond_mins}}"
                                   @else
                                        value="0"
                                   @endif
                                    required="">
                            @if ($errors->has('time_to_respond_mins'))
                                <div class="col-md-12 pl-20">
                                    <p class="bold red text-center">{{ $errors->default->first('time_to_respond_mins') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 pl-20 mb-10">
                            Time allowed for attendees to claim their ticket
                        </div>
                        <div class="row mt-10 mb-10 p-10">
                            <div class="col-md-12">
                                <label for="auto_respond_msgs">Auto-response message:</label>
                            </div>
                            <div class="col-md-12 pl-20">
                                <textarea class="" id="auto_respond_msgs" name="auto_respond_msgs" required="">
                                    @if(isset($waitList))
                                        {{$waitList->auto_respond_msgs}}
                                    @endif
                                </textarea>
                            </div>
                            @if ($errors->has('auto_respond_msgs'))
                                <div class="col-md-12 pl-20">
                                    <p class="bold red text-center">{{ $errors->default->first('auto_respond_msgs') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-10 p-10">
                            <div class="col-md-12">
                                <label for="ticket_release_msgs" >Waitlist ticket release message:</label>
                            </div>
                            <div class="col-md-12 pl-20">
                                <textarea class="" id="ticket_release_msgs" name="ticket_release_msgs" required="">
                                     @if(isset($waitList))
                                        {{$waitList->ticket_release_msgs}}
                                    @endif
                                </textarea>
                            </div>
                            @if ($errors->has('ticket_release_msgs'))
                                <div class="col-md-12 pl-20">
                                    <p class="bold red text-center">{{ $errors->default->first('ticket_release_msgs') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row p-10">
                    <div class="col-md-12">
                        <input type="submit" form="wait_list_setting_form" class="btn btn-sm rounded-border save" value="Save">
                    </div>
                </div>
            </form>
        </section>
    </div>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/ckeditor/config.js')}}"></script>
    <script src="{{asset('js/ckeditor/styles.js')}}"></script>
    <script>
        var config = {
            language : 'en',
            height : '150',
            width : '1000',
            colorButton_colors : 'F00,FF8C00,FFFF00,3A9D23,318CE7,0FF,00FF00,FF00FF',
        };

        CKEDITOR.replace( 'auto_respond_msgs' ,config);
        CKEDITOR.replace( 'ticket_release_msgs' ,config);
        function toggleEnableContainer(elem) {
            if($("#"+$(elem).attr('id')).val() == 1){
                $(".enabled_container").removeClass('hidden');
            }else{
                $(".enabled_container").addClass('hidden');
            }
        }
    </script>
@endsection