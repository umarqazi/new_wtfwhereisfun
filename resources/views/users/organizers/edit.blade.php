@extends('layouts.master')
@section('title', "Manage-Organizers-Create")
@section('content')
    <!-- ______________________ Start Main Content __________________ -->
    <div class="container-fluid profileSideBar">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="card member-card">
                    <div class="header l-slategray">
                        <h4 class="m-t-10">{{$organizer->name}}</h4>
                    </div>
                    <div class="member-img">
                        <form id="organizers-profile-image" method="post" enctype="multipart/form-data">
                            <label>
                                <input id="image" style="display: none" type="file" name="thumbnail" accept="image/*" onchange="organizerUploadFile(this, 'profile')"/>
                                <input type="hidden" name="id" value="{{$organizer->id}}"/>
                                <div class="rounded-circle vendor-profile-image">
                                    @if(!empty($organizer->thumbnail))
                                        @php
                                            $image = $directory['web_path'].$organizer->thumbnail;
                                            $removeClass = '';
                                        @endphp
                                    @else
                                        @php
                                            $image = asset('img/default-148.png');
                                            $removeClass = 'hidden';
                                        @endphp
                                    @endif
                                    <img src="{{$image}}" alt="profile-image" id="target">
                                </div>
                            </label>
                        </form>
                        <form method="post" action="{{url('organizers/remove-image')}}" id="remove-form">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="post" />
                            <input type="hidden" name="organizer_id" value="{{$organizer->id}}">
                            <button type="submit" onclick="return confirm('Are you sure Want to Remove Image ?')" title="Click Here To Remove Image" class="btn btn-raised btn-sm rounded-border {{$removeClass}}">Remove</button>
                        </form>
                    </div>

                    <div class="body">
                        <div class="col-12">
                            <p class="text-muted">{{$organizer->website}}</p>
                        </div>
                        <hr>
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#profile">Profile</a></li>
                            <li><a data-toggle="pill" href="#social-links">Social Links</a></li>
                            <li><a data-toggle="pill" href="#header-image">Header Image</a></li>
                            <li><a data-toggle="pill" href="#color-customizations">Color Customizations</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-8">
                <div class="tab-content form-border-effect">
                    <div id="profile" class="tab-pane fade in active">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Profile</h4>
                            </div>
                            <div class="contc-detail-inner">
                                <form method="post" id="organizer-profile">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Organizer name</label>
                                                <input type="text" class="form-control" placeholder="Organizer's Name" name="name"  value="{{$organizer->name}}" required>
                                                <span class="field-beffect"></span>
                                                <div class="form-error name"></div>
                                            </div>
                                        </div>
                                        <div class="ccol-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">About the organizer</label>
                                                <input class="form-control" placeholder="About the organizer" value="{{$organizer->description}}" name="description" required type="text">
                                                <span class="field-beffect"></span>
                                                <div class="form-error description"></div>
                                                <div class="form-group">
                                                    <input class="form-control" type="checkbox" id="basic_checkbox_1" value="{{$organizer->is_allowed_on_event_page}}" name="is_allowed_on_event_page" @if($organizer->is_allowed_on_event_page == 1) checked @endif>
                                                    <label for="basic_checkbox_1">Use this description on my event pages </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input class="form-control" placeholder="Email" value="{{$organizer->email}}" name="email" required type="email">
                                                <span class="field-beffect"></span>
                                                <div class="form-error email"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group organizer-pages-url">
                                                <label for="">Contact</label>
                                                <div id="organizer-edit-url-input">
                                                    <input class="form-control" placeholder="202-555-0191" value="{{$organizer->contact}}" name="contact" required type="text">
                                                    <span class="field-beffect"></span>
                                                    <div class="form-error contact"></div>&nbsp;&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Website</label>
                                                <input class="form-control" placeholder="Website" value="{{$organizer->website}}" name="website" required type="text">
                                                <span class="field-beffect"></span>
                                                <div class="form-error website"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group organizer-pages-url">
                                                <label for="">Location</label>
                                                <div id="organizer-edit-url-input">
                                                    <input class="form-control" placeholder="City, Country" value="{{$organizer->location}}" name="location" required type="text">
                                                    <span class="field-beffect"></span>
                                                    <div class="form-error organizer_url"></div>&nbsp;&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$organizerId}}" name="organizer_id">
                                    <button type="submit" class="btn btn-default organizer-btn rounded-border">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="social-links" class="tab-pane fade in">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Organizer's Social Links</h4>
                            </div>
                            <div class="contc-detail-inner">
                                <form id="organizer-social-links" method="post">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Facebook page</label>
                                                <input class="form-control" placeholder="http://facebook.com" name="facebook" type="text" value="{{$organizer->facebook}}">
                                                <span class="field-beffect"></span>
                                                <div class="form-error facebook"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Twitter</label>
                                                <input class="form-control" placeholder="http://twitter.com" name="twitter" type="text" value="{{$organizer->twitter}}">
                                                <span class="field-beffect"></span>
                                                <div class="form-error twitter"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Google</label>
                                                <input class="form-control" placeholder="http://google.com" name="google" type="text" value="{{$organizer->google}}">
                                                <span class="field-beffect"></span>
                                                <div class="form-error google"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Linkedin</label>
                                                <input class="form-control" placeholder="http://linkedin.com" name="linkedin" type="text" value="{{$organizer->linkedin}}">
                                                <span class="field-beffect"></span>
                                                <div class="form-error linkedin"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Timbler</label>
                                                <input class="form-control" placeholder="http://timbler.com" name="timbler" type="text" value="{{$organizer->timbler}}">
                                                <span class="field-beffect"></span>
                                                <div class="form-error timbler"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Instagram</label>
                                                <input class="form-control" placeholder="http://instagram.com" name="instagram" type="text" value="{{$organizer->instagram}}">
                                                <span class="field-beffect"></span>
                                                <div class="form-error instagram"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$organizerId}}" name="organizer_id">
                                    <button type="submit" class="btn btn-default organizer-btn rounded-border">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="header-image" class="tab-pane fade in">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Update Header Image</h4>
                            </div>
                            <div class="contc-detail-inner">
                                <div class="header-image">

                                    <div class="">
                                        <div class="organizer-image">
                                            @if(!empty($organizer->image))
                                                @php
                                                    $image = $directory['web_path'].$organizer->image;
                                                    $removeClass = '';
                                                @endphp
                                            @else
                                                @php
                                                    $image = asset('img/dummy.jpg');
                                                    $removeClass = 'hidden';
                                                @endphp
                                            @endif
                                            <img src="{{$image}}" alt="header-image" id="organizer-header-image">
                                        </div>
                                        <form id="organizers-header-image" method="post">

                                                <div class="upload-profile-btn-wrap btn btn-default">
                                                    <span>choose file</span>
                                                    <input type="file" name="image" onchange="organizerUploadFile(this, 'header')" data-type="header" id="organizer-header-image-input" class="upload-profile-btn rounded-border"/>
                                                    <input type="hidden" name="id" value="{{$organizer->id}}"/>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="color-customizations" class="tab-pane fade in">
                        <div class="contc-detail-wrap">
                            <div class="acnt-adrs-innertitle">
                                <h4>Customize your colors</h4>
                            </div>
                            <div class="contc-detail-inner">
                                <form method="post" id="organizer-color-customization">
                                    <div class="row">
                                        <div class="col-sm-3 form-group orgenizer-color-change">
                                            <label for="">Background</label>
                                            <input class="form-control" name="background_color" value="{{$organizer->background_color}}" onchange="manageColors('BG',this.value)" required="" type="color">
                                            <div class="form-error background_color"></div>
                                        </div>
                                        <div class="col-sm-3 form-group orgenizer-color-change">
                                            <label for="">Text</label>
                                            <input class="form-control" name="text_color" value="{{$organizer->text_color}}" onchange="manageColors('TC',this.value)" required="" type="color">
                                            <div class="form-error text_color"></div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="">Color preview</label>
                                            <div class="color-preview">This is your text color </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$organizerId}}" name="organizer_id">
                                    <button type="submit" class="btn btn-default organizer-btn rounded-border">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection