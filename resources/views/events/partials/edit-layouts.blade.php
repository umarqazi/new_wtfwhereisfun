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
                                <form method="post" id="event-layout" onsubmit="updateEventLayout(event, this)" enctype="multipart/form-data">
                                    <div class="row layout-listing">
                                        <div class="col-md-12">
                                            <h4>Select Event Layout <span class="required-field">*</span></h4>
                                        </div>
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
                                            <input type="hidden" name="header_image_exist" id="header_image_exist" value="{{$event->header_image}}">
                                        @else
                                            @php
                                                $browseClass = 'show-block';
                                                $imgClass    = 'hidden';
                                                $toolClass   =  '';
                                                $header_image=  '';
                                            @endphp
                                            <input type="hidden" name="header_image_exist" value="" id="header_image_exist">
                                        @endif
                                        <div class="col-md-12">
                                            <h4>Upload Event Image <span class="required-field">*</span></h4>
                                        </div>
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
                                            @if(count($locations) > 0)
                                                <a href="{{url('events/'.$eventId.'/'.$locations->first()->encrypted_id)}}" target="_blank" id="event-preview-button" class="btn btn-default btn-save rounded-border">Preview</a>
                                            @else
                                                <a href="javascript:void(0)" id="event-preview-button" target="_blank" onclick="locationError()" class="btn btn-default btn-save rounded-border">Preview</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                <form method="post" onsubmit="eventGolive(event, this)">
                                    <input type="hidden" name="event_id" value="{{$eventId}}">
                                    <button type="submit" class="btn btn-default btn-save rounded-border" id="go-live" disabled>Go Live</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>