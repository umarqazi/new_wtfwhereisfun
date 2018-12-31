@extends('layouts.master')
@section('title', "My Tickets ")
@section('content')
    <div class="container custom-margin-top">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="dispute-listing">
                        <div class="img-holder">
                            @if(!empty($dispute_details->user->profile_thumbnail))
                                <img src="{{$dispute_details->user->directory.$dispute_details->user->profile_thumbnail}}">
                            @else
                                <img src="{{asset('img/default-148.png')}}">
                            @endif
                            @if(!$dispute_details->is_closed)
                                @if($dispute_details->event->vendor->id == Auth::user()->id)
                                    @if($dispute_details->eventOrder->payment_status != 'refunded')
                                        @if(($dispute_details->event->refund_policy->days != 0) && (\Carbon\Carbon::now() <= getTicketRefundDays($dispute_details->eventOrder->ticket->time_location->starting, $dispute_details->event->refund_policy->days)))
                                            <a href="{{url('order/refund/'.$dispute_details->eventOrder->encrypted_id)}}" class="btn btn-sm rounded-border pull-right refund-button" >Refund</a>
                                        @endif
                                    @endif
                                @endif
                            @endif
                            <p class="dispute-user">{{$dispute_details->user->first_name}} {{$dispute_details->user->last_name}}</p>
                        </div>
                        <div class="dispute-detail">
                            <h2>Event Title</h2>
                            <p>{{$event_details->title}}</p>
                        </div>
                        <div class="dispute-detail">
                            <h2>Subject</h2>
                            <p>{{$dispute_details->subject}}</p>
                        </div>
                        <div class="dispute-detail">
                            <h2>Message</h2>
                           <p>{!! $dispute_details->message !!}</p>
                        </div>
                        <div class="dispute-detail">
                            <h2>Replies</h2>
                            @if(!$dispute_details->dispute_replies)
                                 <p>No reply yet..</p>
                                @else
                                @foreach($dispute_details->dispute_replies as $reply)
                                    <hr/>
                                    <strong>{{$reply->user->first_name}} : <span class="pull-right">{{ \Carbon\Carbon::parse($reply->created_at)->formatLocalized('%d %b %Y')}}</span></strong>
                                     <p>{!! $reply->message !!}</p>
                                @endforeach
                            @endif
                        </div>
                        @if(!$dispute_details->is_closed)
                            <div class="dispute-detail">
                                <form method="POST" action="{{ url('/dispute-reply') }}" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                    <h2>Reply</h2>
                                    <textarea class="form-control" id="reply" required name="reply"></textarea>
                                    <input type="hidden" name="dispute_id" value="{{$dispute_details->id}}">
                                    <button type="submit" class="btn rounded-border">
                                        Submit
                                    </button>
                                </form>
                            </div>
                       @endif
                    </div>
                    {{--<div class="date">2018: 1222 i99</div>--}}
                </div>
            </div>
        </div>

    </div>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/ckeditor/config.js')}}"></script>
    <script src="{{asset('js/ckeditor/styles.js')}}"></script>

    <script>
        var config = {
            language : 'en',
            height : '250',
            width : '',
            colorButton_colors : 'F00,FF8C00,FFFF00,3A9D23,318CE7,0FF,00FF00,FF00FF',
        };

        CKEDITOR.replace( 'reply' ,config);
        timer = setInterval(updateDiv,100);
        function updateDiv(){
            var editorText = CKEDITOR.instances.message.getData();
            $('#reply').html(editorText);
        }
    </script>
@endsection