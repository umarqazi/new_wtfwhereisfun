@extends('layouts.master')
@section('title', "Complete-Event-Details")
@section('content')
    {{-- ______________________ Start Main Content __________________ --}}
    <link rel="stylesheet" href="{{asset('css/eventpage/richtext.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/eventpage/bootstrap-datetimepicker.min.css')}}">
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/eventpage/jquery.bxslider.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/fancybox/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/eventpage/jquery.bxslider.css')}}">
    <link rel="stylesheet" href="{{asset('listgo/css/listgo-custom.css')}}">

    <div class="container-fluid profileSideBar">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="card member-card">
                    <div class="body">
                        <hr>
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#details">Event Details</a></li>
                            <li><a data-toggle="pill" href="#topics">Event Topics</a></li>
                            <li><a data-toggle="pill" href="#locations">Event Time and Locations</a></li>
                            <li><a data-toggle="pill" href="#tickets">Event Tickets</a></li>
                            <li><a data-toggle="pill" href="#layouts">Event Layouts and Images</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    @include('events.partials.edit-details')
                    @include('events.partials.edit-topics')
                    @include('events.partials.edit-time-location')
                    @include('events.partials.edit-tickets')
                    @include('events.partials.edit-layouts')
                </div>
            </div>

        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/ckeditor/config.js')}}"></script>
    <script src="{{asset('js/ckeditor/styles.js')}}"></script>

    @php
        $previousUrl = explode('/', URL::previous());
        $previousUrl = end($previousUrl);
    @endphp
    <script>
        var url = "{{$previousUrl}}";
        if(url == 'create'){
            setTimeout(function(){
                nextTab();
            },2000);
        }
        var config = {
            language : 'en',
            height : '250',
            width : '',
            colorButton_colors : 'F00,FF8C00,FFFF00,3A9D23,318CE7,0FF,00FF00,FF00FF',
        };

        CKEDITOR.replace( 'description' ,config);
        timer = setInterval(updateDiv,100);
        function updateDiv(){
            var editorText = CKEDITOR.instances.description.getData();
            $('#description').html(editorText);
        }
    </script>

@endsection