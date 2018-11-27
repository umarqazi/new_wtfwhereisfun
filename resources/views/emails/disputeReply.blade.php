<h1> A New Disputes has been Created !</h1>


<h3> Dispute Subject: </h3> <p> {{$reply->dispute->subject}}</p>
<br>
<h3> Dispute Subject: </h3> <p>{{$reply->dispute->subject}}</p>

<h3>Replies:</h3>

@if(count($reply->dispute->dispute_replies) > 0 )
    @foreach ($reply->dispute->dispute_replies as $dispute_reply)
        <p>{{$dispute_reply->message}}</p>
    @endforeach
@endif
<span>New: </span>
<p>{{$reply->message}}</p>

