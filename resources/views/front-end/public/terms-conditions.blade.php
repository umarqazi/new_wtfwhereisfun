@extends('layouts.master')
@section('title', "Terms And Conditions :: Where's the fun")
<!-- ______________________ Start Main Content __________________ -->
<div id="maincontent" class="main-content">
    <div class="container">
        <div class="account-setting-head row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="acs-title"><h3>Terms & Conditions</h3></div>
            </div>
        </div>
        <div class="row">
            <div class="acs-content-wrap col-md-12 col-sm-12 col-xs-12">
                <div class="acs-content-inner">
                    <div class="attnde-rfrl-wrap">
                        <div class="attnde-rfrl-list">
                            {!! $content->content !!}
                        </div>
                    </div>
                </div>
            </div><!-- /.side-content-wrap -->
        </div>
    </div>
</div><!-- /.main-content -->
