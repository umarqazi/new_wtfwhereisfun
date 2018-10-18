@extends('layouts.master')
@section('title', "About Us :: Where's the fun")
@section('content')
    <div id="maincontent" class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 content-heading">
                    <div class="acs-title"><h3>About US</h3></div>
                </div>
                <div class="row">
                    <div class="acs-content-wrap col-md-12 col-sm-12 col-xs-12">
                        <div class="acs-content-inner">
                            <div class="attnde-rfrl-wrap">
                                <div class="attnde-rfrl-list">
                                    {!!  $content->content !!}
                                </div>
                            </div>
                        </div>
                    </div><!-- /.side-content-wrap -->
                </div>
            </div>
        </div>
    </div><!-- /.main-content -->
@endsection