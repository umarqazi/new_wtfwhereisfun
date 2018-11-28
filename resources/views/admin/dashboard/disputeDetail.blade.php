<!-- dispute  Style -->
<link href="{{asset('css/dispute.css')}}" rel="stylesheet" type="text/css">


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="dispute-listing">
                    <div class="img-holder">
                        @if(!empty($dispute_details->user->directory.$dispute_details->user->profile_thumbnail))
                            <img src="{{$dispute_details->user->directory.$dispute_details->user->profile_thumbnail}}">
                        @else
                            <img src="{{asset('img/default-148.png')}}">
                            <p>{{$dispute_details->user->first_name}}</p>
                        @endif
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
                </div>
            </div>
        </div>
    </div>

</div>

