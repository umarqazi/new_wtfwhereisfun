@extends('layouts.master')
@section('title', "My Tickets :: Where's the fun")
@section('content')
    <div class="container custom-margin-top">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="dispute-listing">
                        <div class="img-holder">
                            <img src="{{asset('images/contact_list-profile2.jpg')}}">
                            <p>Sorav</p>
                        </div>
                        <div class="dispute-detail">
                            <h2>Event Title</h2>
                            <p>{{$event_details->title}}</p>
                        </div>
                        <form method="POST" action="{{ url('/submit-dispute') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="dispute-detail">
                                <h2>Subject</h2>
                                <input type="text" name="subject" class="form-control" required placeholder="Please enter dispute subject">
                                <input type="hidden" name="event_id" value="{{$event_details->id}}">
                                <input type="hidden" name="order_id" value="{{$order_id}}">
                            </div>
                            <div class="dispute-detail">
                                <h2>Message</h2>
                                <textarea class="form-control" id="message" required name="message"></textarea>
                            </div>
                            <button type="submit" class="btn rounded-border">
                                Submit
                            </button>
                        </form>
                    </div>
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

        CKEDITOR.replace( 'message' ,config);
        timer = setInterval(updateDiv,100);
        function updateDiv(){
            var editorText = CKEDITOR.instances.message.getData();
            $('#message').html(editorText);
        }
    </script>
@endsection