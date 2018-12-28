<form id="waitListForm-{{$ticket->id}}" class="form-horizontal hidden" action="{{ url('/events/signup-for-waiting') }}" method="POST">
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
    <input type="hidden" name="event_id" value="{{$event->id}}">
    <input type="hidden" name="event_time_location_id" value="{{$eventLocation->id}}">
    @if($waitList->collect_name != null)
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Full Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name">
            @if ($errors->has('name'))
                <div class="col-md-12 pl-20">
                    <p class="bold red text-center">{{ $errors->default->first('name') }}</p>
                </div>
            @endif
        </div>
    </div>
    @endif
    @if($waitList->collect_email != null)
    <div class="form-group">
        <label class="control-label col-sm-3" for="email">Email:</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            @if ($errors->has('email'))
                <div class="col-md-12 pl-20">
                    <p class="bold red text-center">{{ $errors->default->first('email') }}</p>
                </div>
            @endif
        </div>
    </div>
    @endif
    @if($waitList->collect_phn != null)
    <div class="form-group">
        <label class="control-label col-sm-3" for="phn">Phone Number:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="phn" name="phn" placeholder="Enter Phone Number">
        </div>
    </div>
    @endif
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-sm rounded-border">Submit</button>
        </div>
    </div>
</form>