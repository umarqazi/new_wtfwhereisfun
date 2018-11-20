@extends('layouts.master')
@section('title', "Where's the fun :: Complete-Event-Details")
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

                    <div id="topics" class="tab-pane fade in">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Event Topics And Category</h4>
                            </div>
                            <div class="event-topics-detail-inner">
                                <div class="">
                                    <form method="post" id="event-topics">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Event Category</label>
                                                <select class="form-control" name="category">
                                                    <option value="" @if(is_null($event->category)){{'selected'}}@endif>Select Event Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}"
                                                        @if(!is_null($event->category) && $category->id == $event->category_id){{'selected'}}@endif>{{$category->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Event Type</label>
                                                <select class="form-control" id="event_type" name="event_type">
                                                    <option value="" @if(is_null($event->type)){{'selected'}}@endif>Select Event Type</option>
                                                    @foreach($eventTypes as $type)
                                                        <option value="{{$type->id}}"
                                                        @if(!is_null($event->type) && $type->id == $event->event_type_id){{'selected'}}@endif>{{$type->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Event Topic</label>
                                                <select class="form-control" id="event_topic" name="event_topic">
                                                    <option value="" @if(is_null($event->topic)){{'selected'}}@endif>Select Topic</option>
                                                    @foreach ($eventTopics as $topic)
                                                        <option value="{{$topic->id}}"@if(!is_null($event->topic) && $topic->id == $event->event_topic_id){{'selected'}}@endif>{{$topic->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6 event-tags">
                                                <label>Event Tags</label>
                                                <select multiple data-role="tagsinput" name="event_tags[]" onkeypress="return event.keyCode != 13;">
                                                    @if(!$eventTags->isEmpty())
                                                        <option value="hell">Hell</option>
                                                        @foreach($eventTags as $tag)
                                                            <option value="{{$tag->name}}">{{$tag->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="applybutton_right">
                                                <button type="submit" class="btn btn-default profile-btn rounded-border">Save & Continue</button>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$eventId}}" name="event_id">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="locations" class="tab-pane fade">
                        @include('events.partials.edit-time-location')
                    </div>

                    <div id="tickets" class="tab-pane fade">
                        @include('events.partials.edit-tickets')
                    </div>

                    <div id="layouts" class="tab-pane fade">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Event Layouts and Image Uploading</h4>
                            </div>
                            <div class="shipping-address-inner">
                                <div class="event-layout-listing">
                                    <div class="p-top-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="listings">
                                                    <form method="post" id="event-layout" onsubmit="updateEventLayout(this)" enctype="multipart/form-data">
                                                        <div class="row layout-listing">
                                                            <input type="hidden" id="event_layout_id" name="event_layout" value="{{$event->event_layout_id}}">
                                                            <input type="hidden" id="" name="event_id" value="{{$eventId}}">
                                                            @php $asset = asset('img'); @endphp
                                                            @foreach($layouts as $layout)
                                                                <div class="col-sm-6 col-lg-3">
                                                                    <div class="listing listing--grid1 @if($layout->id == $event->event_layout_id){{"active"}} @endif" onclick="selectLayout(this)" id="{{$layout->id}}">
                                                                        <div class="listing__media">
                                                                            <div class="mask"></div>
                                                                            <a class="zoomIcon fancybox" data-fancybox="gallery" data-caption="Event Template" href="{{$asset.'/'.$layout->image}}">
                                                                                <i class="fa fa-search"></i>
                                                                                <i class="fa fa-check"></i>
                                                                            </a>
                                                                            <img src="{{$asset.'/'.$layout->image}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row upload-imges-row">
                                                            @if(!empty($event->header_image))
                                                                @php
                                                                    $browseClass = 'hidden';
                                                                    $imgClass    = 'show-block';
                                                                    $toolClass   =  'hidden';
                                                                    $header_image=  $directory['web_path'].$event->header_image;
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $browseClass = 'show-block';
                                                                    $imgClass    = 'hidden';
                                                                    $toolClass   =  '';
                                                                    $header_image=  '';
                                                                @endphp
                                                            @endif
                                                            <div class="col-md-12">
                                                                <div class="tooltipContainer">
                                                                    <div class="customToolTip">
                                                                        <h1>Photos</h1>
                                                                        <p>Files must be in JPEG, JPG, PNG.
                                                                            <br>
                                                                            Image size must be 1600 X 700
                                                                        </p>
                                                                    </div>
                                                                    <label class="header-img">
                                                                        <input type="file" style="display: none" name="header_image" onchange="eventImageUpdate(this, 'header')">
                                                                        <img src="{{$header_image}}" id="header-image" class="main-img {{$imgClass}}">
                                                                        <div class="label-content {{$browseClass}}">
                                                                            <div class="browse-icon"></div>
                                                                            Browse
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            @if(count($event->images))
                                                                @php
                                                                    $browseClass = 'hidden';
                                                                    $imgClass    = 'show-block';
                                                                    $removeBtn   = 'show-block';
                                                                    $toolClass   =  'hidden';
                                                                    $disableEvent= 'disable-events';
                                                                @endphp
                                                                @foreach($event->images as $img)
                                                                    @php
                                                                        $imgSrc      =  $directory['web_path'].$img->name;
                                                                        $imgId       =  encrypt_id($img->id);
                                                                    @endphp
                                                                    <div class="col-md-4">
                                                                        <div class="tooltipContainer">
                                                                            <button type="button" class="remove-button {{$removeBtn}}" onclick="removeEventImage(this, '{{$imgId}}')">
                                                                                <i class="fa fa-trash"></i>
                                                                            </button>
                                                                            <label class="header-img {{$disableEvent}}">
                                                                                <img src="{{$imgSrc}}" id="gallery-image-{{$imgId}}" class="main-img {{$imgClass}}">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                @php
                                                                    $browseClass = 'show-block';
                                                                    $imgClass    = 'hidden';
                                                                    $imgSrc      =  '';
                                                                    $removeBtn   = 'hidden';
                                                                    $imgId       = null;
                                                                    $toolClass   =  '';
                                                                    $disableEvent= '';
                                                                @endphp

                                                                <div class="col-md-4">
                                                                    <div class="tooltipContainer">
                                                                        <div class="customToolTip {{$toolClass}}">
                                                                            <h1>Photos</h1>
                                                                            <p>Files must be in JPEG, JPG, PNG.
                                                                                <br>
                                                                                Image size must be 600 X 600
                                                                            </p>
                                                                        </div>
                                                                        <button type="button" class="remove-button {{$removeBtn}}" onclick="removeEventImage(this, '{{'imgid'}}')">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                        <label class="header-img {{$disableEvent}}">
                                                                            <input type="hidden" name="event_id" id="event_id" value="{{$eventId}}">
                                                                            <input type="file" style="display: none" name="gallery_image" onchange="eventImageUpdate(this,'gallery')">
                                                                            <img src="" id="gallery-image-{{mt_rand()}}" class="main-img {{$imgClass}}">
                                                                            <div class="label-content {{$browseClass}}">
                                                                                <div class="browse-icon"></div>
                                                                                Browse<br>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endif


                                                        </div>
                                                        <div class="form-group">
                                                            <div class="applybutton_right">
                                                                <button type="button" onclick="addNewImage('{{$eventId}}')" class="btn btn-default rounded-border"><i class="fa fa-plus"></i> Add More Images</button>
                                                                <button type="submit" class="btn btn-default btn-save rounded-border">Save Draft</button>
                                                                <a href="{{url('events/'.$eventId)}}" target="_blank" class="btn btn-default btn-save rounded-border">Preview</a>

                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form method="post" onclick="eventGolive(event, this)">
                                                        <input type="hidden" name="event_id" value="{{$eventId}}">
                                                        <button type="submit" class="btn btn-default btn-save rounded-border">Go Live</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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