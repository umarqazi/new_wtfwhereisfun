@extends('layouts.master')
@section('title', "Where's the fun :: Manage-Organizers-Create")
<!-- ______________________ Start Main Content __________________ -->
<div class="container-fluid profileSideBar">
    <div class="row">
        <div class="col-md-3 col-sm-4">
            <div class="card member-card">
                <div class="header l-slategray">
                    <h4 class="m-t-10">{{$organizer->name}}</h4>
                </div>
                <div class="member-img">
                    <a href="profile.html" class="">
                        <img src="{{$organizer->thumbnail}}" class="rounded-circle" alt="profile-image">
                    </a>
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
                                <button type="submit" class="btn btn-default organizer-btn">Save</button>
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
                                            <input class="form-control" placeholder="Facebook.com" id="" name="facebook" type="text" value="{{$organizer->facebook}}">
                                            <span class="field-beffect"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Twitter</label>
                                            <input class="form-control" placeholder="@" name="twitter" type="text" value="{{$organizer->twitter}}">
                                            <span class="field-beffect"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Google</label>
                                            <input class="form-control" placeholder="Google.com" id="" name="google" type="text" value="{{$organizer->google}}">
                                            <span class="field-beffect"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Linkedin</label>
                                            <input class="form-control" placeholder="Linkedin.com" name="linkedin" type="text" value="{{$organizer->linkedin}}">
                                            <span class="field-beffect"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Timbler</label>
                                            <input class="form-control" placeholder="Timbler.com" name="timbler" type="text" value="{{$organizer->timbler}}">
                                            <span class="field-beffect"></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">Instagram</label>
                                            <input class="form-control" placeholder="Instagram.com" name="instagram" type="text" value="{{$organizer->instagram}}">
                                            <span class="field-beffect"></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$organizerId}}" name="organizer_id">
                                <button type="submit" class="btn btn-default organizer-btn">Save</button>
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
                                <button type="submit" class="btn btn-default organizer-btn">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
{{--<div id="maincontent" class="main-content" style="padding-top: 80px!important;">--}}
    {{--<div class="organizer-profile-section">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="organizer-profile-wrap form-border-effect">--}}
                {{--<div class="organizer-profile-title-section clearfix">--}}
                    {{--<div class="organizer-profile-title-wrap clearfix">--}}

                        {{--<div class="organizer-profile-title col-sm-5">--}}
                            {{--<h2>Organizer Profile</h2>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-5 col-sm-offset-2">--}}
                            {{--<ul>--}}
                                {{--<li><a href="{{url('organizers/create')}}">Create a new organizer</a></li>--}}
                                {{--@if(count($userOrganizers))--}}
                                    {{--@foreach($userOrganizers as $organizer)--}}
                                        {{--<li><a href="{{url('organizers/'.encrypt_id($organizer->id).'/edit')}}">{{$organizer->name}}</a></li>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</ul>--}}
                            {{--<select class="form-control">--}}
                            {{--<option><a href="{{url('organizers/create')}}">Create a new organizer</a></option>--}}
                            {{--@if(count($userOrganizers))--}}
                            {{--@foreach($userOrganizers as $organizer)--}}
                            {{--<option><a href="{{url('organizers/{encrypt_id($organizer->id)}/edit')}}">{{$organizer->name}}</a></option>--}}
                            {{--@endforeach--}}
                            {{--@endif--}}
                            {{--</select>--}}
                            {{--<span class="field-beffect"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="organizer-profile-title-dis">--}}
                        {{--<p>Create an organizer profile so attendees can browse all your events in one place.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="organizer-profile-content">--}}
                    {{--<form class="organizer-profile-form-wrap" method="post" id="organizer-form">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-12 col-sm-7 col-md-8">--}}
                                {{--<div class="organizer-profile-form-left">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="">Organizer name</label>--}}
                                                {{--<input type="text" class="form-control" placeholder="Organizer name" id="" name="name" required>--}}
                                                {{--<span class="field-beffect"></span>--}}
                                                {{--<div class="form-error name"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="ccol-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="">About the organizer</label>--}}
                                                {{--<input class="form-control" placeholder="About the organizer" id="" name="description" required="" type="text">--}}
                                                {{--<span class="field-beffect"></span>--}}
                                                {{--<div class="form-error description"></div>--}}
                                                {{--<div class="checkbox-feild-wrap">--}}
                                                    {{--<input type="checkbox" id="organizing-events" name="is_allowed_on_event_page" value="1">--}}
                                                    {{--<label for="organizing-events">Use this description on my event pages </label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="">Website</label>--}}
                                                {{--<input class="form-control" placeholder="Website" id="" name="website" required type="text">--}}
                                                {{--<span class="field-beffect"></span>--}}
                                                {{--<div class="form-error website"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group organizer-pages-url">--}}
                                                {{--<label for="">Organizer page URL--}}
                                                    {{--<span id="edit-url-link"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span><br>--}}
                                                {{--</label>--}}
                                                {{--<div id="organizer-edit-url-input">--}}
                                                    {{--<input class="form-control" placeholder="http://"--}}
                                                           {{--name="organizer_url" required="" type="text" value="">--}}
                                                    {{--<span class="field-beffect"></span>--}}
                                                    {{--<div class="form-error organizer_url"></div>--}}
                                                    {{--&nbsp;&nbsp;<span  id="cancel-btn">cancel</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="acnt-adrs-innertitle add-social-network-title">--}}
                                        {{--<h3>Add Your Social Network Feeds</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="">Facebook page</label>--}}
                                                {{--<input class="form-control" placeholder="Facebook.com" id="" name="facebook" type="text">--}}
                                                {{--<span class="field-beffect"></span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="">Twitter</label>--}}
                                                {{--<input class="form-control" placeholder="@" name="twitter" type="text">--}}
                                                {{--<span class="field-beffect"></span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="">Google</label>--}}
                                                {{--<input class="form-control" placeholder="Google.com" id="" name="google" type="text">--}}
                                                {{--<span class="field-beffect"></span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="">Linkedin</label>--}}
                                                {{--<input class="form-control" placeholder="Linkedin.com" name="linkedin" type="text">--}}
                                                {{--<span class="field-beffect"></span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="">Timbler</label>--}}
                                                {{--<input class="form-control" placeholder="Timbler.com" name="timbler"  type="text">--}}
                                                {{--<span class="field-beffect"></span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="acnt-adrs-innertitle">--}}
                                        {{--<h3>Customize your colors</h3>--}}
                                    {{--</div>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-3 form-group orgenizer-color-change">--}}
                                            {{--<label for="">Background</label>--}}
                                            {{--<input class="form-control" name="backgroud_color" onchange="manageColors('BG',this.value);" required="" type="color">--}}
                                            {{--<div class="form-error backgroud_color"></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-3 form-group orgenizer-color-change">--}}
                                            {{--<label for="">Text</label>--}}
                                            {{--<input class="form-control" name="text_color" onchange="manageColors('TC',this.value);" required="" type="color">--}}
                                            {{--<div class="form-error text_color"></div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-6 form-group">--}}
                                            {{--<label for="">Color preview</label>--}}
                                            {{--<div class="color-preview">This is your text color </div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-12 col-sm-5 col-md-4">--}}
                                {{--<div class="upload-profile-wrap">--}}
                                    {{--<div class="upload-profile-img">--}}
                                        {{--<img style="width:100%" alt="organizer-img">--}}
                                        {{--<i class="fa fa-user-o" aria-hidden="true"></i>--}}
                                    {{--</div>--}}
                                    {{--<p class="upload-profile-dis">--}}
                                        {{--JPG, GIF or PNG no larger than 1MB. Square images look the best!--}}
                                    {{--</p>--}}
                                    {{--<div class="upload-profile-box">--}}
                                        {{--<div class="upload-profile-btn-wrap btn btn-default">--}}
                                            {{--<span>choose file</span>--}}
                                            {{--<input type="file" name="image" class="upload-profile-btn"/>--}}
                                        {{--</div>--}}
                                        {{--<div class="upload-profile-remove-btn">--}}
                                            {{--<button type="button" class="btn btn-default remove-photo-btn">Remove</button>--}}
                                            {{--<button type="button" class="btn btn-default hidden remove-photo-btn">Remove</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="organizer-profile-btn">--}}
                            {{--<button type="submit" class="btn btn-default organizer-btn">Save</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- /.main-content -->--}}
