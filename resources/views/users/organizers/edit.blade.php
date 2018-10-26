@extends('layouts.master')
@section('title', "Where's the fun :: Manage-Organizers-Create")
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
                                <input id="image" style="display: none" type="file" name="thumbnail" accept="image/*" onchange="organizerUploadFile(this)"/>
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
                                                <input type="text" class="form-control" placeholder="Organizer name" id=""
                                                       name="name"  value="{{$organizer->name}}" required>
                                                <span class="field-beffect"></span>
                                                <div class="form-error name"></div>
                                            </div>
                                        </div>
                                        <div class="ccol-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">About the organizer</label>
                                                <input class="form-control" placeholder="About the organizer" value="{{$organizer->description}}" id="" name="description" required="" type="text">
                                                <span class="field-beffect"></span>
                                                <div class="form-error description"></div>
                                                <div class="checkbox-feild-wrap">
                                                    <input type="checkbox" id="organizing-events" value="{{$organizer->is_allowed_on_event_page}}" name="is_allowed_on_event_page" value="1">
                                                    <label for="organizing-events">Use this description on my event pages </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="">Website</label>
                                                <input class="form-control" placeholder="Website" id="" value="{{$organizer->website}}" name="website" required type="text">
                                                <span class="field-beffect"></span>
                                                <div class="form-error website"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group organizer-pages-url">
                                                <label for="">Organizer page URL</label>
                                                <div id="organizer-edit-url-input">
                                                    <input class="form-control" placeholder="http://" value="{{$organizer->organizer_url}}" name="organizer_url" required="" type="text">
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
                                                <input class="form-control" placeholder="http://facebook.com" id="" name="facebook" type="text" value="{{$organizer->facebook}}">
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
                                                <input class="form-control" placeholder="http://google.com" id="" name="google" type="text" value="{{$organizer->google}}">
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