@extends('layouts.master')
@section('title', "Account-Settings")
{{-- ______________________ Start Main Content __________________ --}}
@section('content')
    <div class="container-fluid profileSideBar">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="card member-card">
                    <div class="header l-green">
                        <h4 class="m-t-10">{{$user->first_name.' '.$user->last_name}}</h4>
                    </div>
                    <div class="member-img">
                        <form id="profile-image" method="post" enctype="multipart/form-data">
                            <label>
                                <input id="image" style="display: none" type="file" name="thumbnail" accept="image/*" onchange="uploadFile(this)"/>
                                <div class="rounded-circle vendor-profile-image">
                                    @if(!empty($user->profile_thumbnail))
                                        @php
                                            $image = $user->directory.$user->profile_thumbnail;
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
                        <form method="post" action="{{url('remove-image')}}" id="remove-form">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button type="submit" onclick="return confirm('Are you sure Want to Remove Image ?')" title="Click Here To Remove Image" class="btn btn-raised btn-sm rounded-border {{$removeClass}}">Remove</button>
                        </form>
                    </div>

                    <div class="body">
                        <div class="col-12">
                            <p class="text-muted">{{$user->email}}</p>
                        </div>
                        <hr>
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#profile">Profile</a></li>
                            <li><a data-toggle="pill" href="#contact">Contact Information</a></li>
                            <li><a data-toggle="pill" href="#address">Address Information</a></li>
                            <li><a data-toggle="pill" href="#email">Email Preferences</a></li>
                            <li><a data-toggle="pill" href="#other">Other Information</a></li>
                            <li><a data-toggle="pill" href="#change-password">Change Password</a></li>
                            @if(Auth::user()->hasRole('vendor'))
                                <li><a data-toggle="pill" href="#payment-info">Payment Information</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    @include('users.vendors.partials.profile-detail')
                    @include('users.vendors.partials.contact-detail')
                    @include('users.vendors.partials.address-detail')
                    @include('users.vendors.partials.email-detail')
                    @include('users.vendors.partials.other-detail')
                    @include('users.vendors.partials.password-detail')
                    @if(Auth::user()->hasRole('vendor'))
                        @include('users.vendors.partials.payment-info')
                    @endif
                </div>
            </div>

        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection