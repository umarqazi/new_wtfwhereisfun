@extends('layouts.master')
@section('title', "Manage-Organizers-Create")
@section('content')
    <!-- ______________________ Start Main Content __________________ -->
    <div id="maincontent" class="main-content" style="padding-top: 80px!important;">
        <div class="organizer-profile-section">
            <div class="container-fluid">
                <div class="organizer-profile-wrap form-border-effect">
                    <div class="organizer-profile-title-section clearfix">
                        <div class="organizer-profile-title-wrap clearfix">

                            <div class="organizer-profile-title col-sm-5">
                                <h2>Organizer Profile</h2>
                            </div>

                            <div class="col-sm-5 col-sm-offset-2">

                                <div class="organizer-dropdown">
                                    <span class="active">Create New Organizer<i class="fa fa-chevron-down"></i></span>
                                    <ul class="list" style="display: none;">
                                        <li><a href="{{url('organizers/create')}}">Create a new organizer</a></li>
                                        @if(count($userOrganizers))
                                            @foreach($userOrganizers as $organizer)
                                                <li><a href="{{url('organizers/'.encrypt_id($organizer->id).'/edit')}}">{{$organizer->name}}</a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="organizer-profile-title-dis">
                            <p>Create an organizer profile so attendees can browse all your events in one place.</p>
                        </div>
                    </div>
                    <div class="organizer-profile-content">
                        <form class="organizer-profile-form-wrap" method="post" id="organizer-form">
                            <div class="row">
                                <div class="col-xs-12 col-sm-7 col-md-8">
                                    <div class="organizer-profile-form-left">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Organizer name</label>
                                                    <input type="text" class="form-control" placeholder="Organizer name" id="" name="name" required>
                                                    <span class="field-beffect"></span>
                                                    <div class="form-error name"></div>
                                                </div>
                                            </div>
                                            <div class="ccol-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">About the organizer</label>
                                                    <input class="form-control" type="text" placeholder="About the organizer" name="description" required />
                                                    <span class="field-beffect"></span>
                                                    <div class="form-error description"></div>
                                                    <div class="form-group">
                                                        <input type="checkbox" id="basic_checkbox_1" name="is_allowed_on_event_page" class="form-control" value="1">
                                                        <label for="basic_checkbox_1">Use this description on my event pages </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input class="form-control" placeholder="Email Address" id="" name="email" required type="email">
                                                    <span class="field-beffect"></span>
                                                    <div class="form-error email"></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group organizer-pages-url">
                                                    <label for="">Contact</label>
                                                    <div id="organizer-edit-url-input">
                                                        <input class="form-control" placeholder="202-555-0191" name="contact" required type="text">
                                                        <span class="field-beffect"></span>
                                                        <div class="form-error contact"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Website</label>
                                                    <input class="form-control" placeholder="http://" id="" name="website" required type="text">
                                                    <span class="field-beffect"></span>
                                                    <div class="form-error website"></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group organizer-pages-url">
                                                    <label for="">Location</label>
                                                    <div id="organizer-edit-url-input">
                                                        <input class="form-control" placeholder="City, Country" name="location" required type="text">
                                                        <span class="field-beffect"></span>
                                                        <div class="form-error location"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="acnt-adrs-innertitle add-social-network-title">
                                            <h3>Add Your Social Network Feeds</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Facebook page</label>
                                                    <input class="form-control" placeholder="Facebook.com" id="" name="facebook" type="text">
                                                    <span class="field-beffect"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Twitter</label>
                                                    <input class="form-control" placeholder="@" name="twitter" type="text">
                                                    <span class="field-beffect"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Google</label>
                                                    <input class="form-control" placeholder="Google.com" id="" name="google" type="text">
                                                    <span class="field-beffect"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Linkedin</label>
                                                    <input class="form-control" placeholder="Linkedin.com" name="linkedin" type="text">
                                                    <span class="field-beffect"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Timbler</label>
                                                    <input class="form-control" placeholder="Timbler.com" name="timbler"  type="text">
                                                    <span class="field-beffect"></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="">Instagram</label>
                                                    <input class="form-control" placeholder="Instagram.com" name="instagram"  type="text">
                                                    <span class="field-beffect"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="acnt-adrs-innertitle">
                                            <h3>Customize your colors</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 form-group orgenizer-color-change">
                                                <label for="">Background</label>
                                                <input class="form-control" name="backgroud_color" onchange="manageColors('BG',this.value);" required="" type="color">
                                                <div class="form-error backgroud_color"></div>
                                            </div>
                                            <div class="col-sm-3 form-group orgenizer-color-change">
                                                <label for="">Text</label>
                                                <input class="form-control" name="text_color" onchange="manageColors('TC',this.value);" required="" type="color">
                                                <div class="form-error text_color"></div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label for="">Color preview</label>
                                                <div class="color-preview">This is your text color </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-4">
                                    <div class="upload-profile-wrap">
                                        <div class="upload-profile-img">
                                            <img style="width:100%" alt="organizer-img" src="{{asset('img/default-148.png')}}">
                                        </div>
                                        <p class="upload-profile-dis">
                                            JPG, GIF or PNG no larger than 1MB. Square images look the best!
                                        </p>
                                        <div class="upload-profile-box">
                                            <div class="upload-profile-btn-wrap btn btn-default">
                                                <span>choose file</span>
                                                <input type="file" name="thumbnail" onchange="readURL(this)" data-type="profile" class="upload-profile-btn rounded-border"/>
                                            </div>
                                            <div class="upload-profile-remove-btn">
                                                <button type="button" class="btn btn-default hidden remove-photo-btn" onclick="removeImagePreview(this)" data-type="profile">Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="upload-profile-wrap">
                                        <div class="organizer-header-img">
                                            <img style="width:100%" alt="Organizer's Header Image" src="{{asset('img/dummy.jpg')}}">
                                        </div>
                                        <p class="upload-profile-dis">
                                            JPG, GIF or PNG no larger than 1MB. Square images look the best!
                                        </p>
                                        <div class="upload-profile-box">
                                            <div class="upload-profile-btn-wrap btn btn-default">
                                                <span>choose file</span>
                                                <input type="file" name="image" onchange="readURL(this)" data-type="header" class="upload-profile-btn rounded-border"/>
                                            </div>
                                            <div class="upload-profile-remove-btn">
                                                <button type="button" class="btn btn-default hidden remove-photo-btn" onclick="removeImagePreview(this)" data-type="header">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="organizer-profile-btn">
                                <button type="submit" class="btn btn-default rounded-border organizer-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-content -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection