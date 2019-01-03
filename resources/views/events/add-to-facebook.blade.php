@extends('layouts.event-dashboard')
@section('title', "My Tickets")
@section('content')
    <div class="page_wrapper event-dashboard @if(strpos(url()->current(),'admin') == true) admin-view @endif">
        @include('events.partials.event-dashboard-sidebar')
        <section class="content home ">
            @include('events.partials.event-dashboard-top-details')
            <div class="fb-app">
                <div class="js-facebook-publish-container">
                    <div class="l-mar-stack"></div>
                    <header class="g-cell g-cell-9-9 show-large">
                        <h1 class="text-heading-primary js-layout-title">Add to Facebook
                            <a class="link--undecorated" href="" target="_blank">
                                <i class="ico-info ico--medium ico--color-brand-light-blue"></i>
                            </a>
                        </h1>
                        <hr class="l-mar-top-2">
                    </header>
                    <section class="js-error-messages-region g-cell g-cell-9-9 facebook-publish__error-region"></section>
                    <section class="js-fb-connect-region">
                        <div>
                            <section class=" g-cell g-cell-9-9 l-mar-top-3">
                                <div>
                                    <a class="js-facebook_publish_connect btn btn--facebook rounded-border facebook-btn" href="{{url('events/'.$location->encrypted_id.'/connect-to-facebook')}}">
                                        <span class="zmdi zmdi-facebook"></span>
                                        <span>Connect to Facebook</span>
                                    </a>
                                    <p class="l-mar-top-6">
                                        Adding your event to Facebook allows people to checkout without leaving your Facebook Event.
                                    </p>

                                    <div class="g-grid l-mar-top-6 l-pad-left-0 l-pad-right-0">

                                        <div class="g-group">
                                            <div class="col-md-4">
                                                <div class="g-group">
                                                    <div class="g-cell hide-medium hide-large g-cell-6-12 g-cell-md-12-12 l-pad-left-0 l-md-pad-left-0 l-lg-pad-left-0">
                                                        <div>1. Connect to Facebook</div>
                                                    </div>
                                                    <div class="g-cell g-cell-6-12 g-cell-md-12-12 g-cell--no-gutters l-align-right l-md-align-left l-lg-align-left">
                                                        <img class="g-img" src="https://cdn.evbstatic.com/s3-build/perm_001/5432a7/django/images/pages/add_to_facebook/fb-connect-auth-screen.png" data-d-retina-src="https://cdn.evbstatic.com/s3-build/perm_001/8279fb/django/images/pages/add_to_facebook/fb-connect-auth-screen@2x.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="g-group">
                                                    <div class="g-cell hide-medium hide-large g-cell-6-12 g-cell-md-12-12 l-pad-left-0 l-md-pad-left-0 l-lg-pad-left-0">
                                                        <div>2. Select the Facebook Page that's hosting the event</div>
                                                    </div>
                                                    <div class="g-cell g-cell-6-12 g-cell-md-12-12 g-cell--no-gutters l-align-right l-md-align-left l-lg-align-left">
                                                        <img class="g-img" src="https://cdn.evbstatic.com/s3-build/perm_001/8a2bd2/django/images/pages/add_to_facebook/fb-connect-page-selection.png" data-d-retina-src="https://cdn.evbstatic.com/s3-build/perm_001/6f148b/django/images/pages/add_to_facebook/fb-connect-page-selection@2x.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="g-group">
                                                    <div class="g-cell hide-medium hide-large g-cell-6-12 g-cell-md-12-12 l-pad-left-0 l-md-pad-left-0 l-lg-pad-left-0">
                                                        <div>3. Publish your new event on Facebook or link to an existing event</div>
                                                    </div>
                                                    <div class="g-cell g-cell-6-12 g-cell-md-12-12 g-cell--no-gutters l-align-right l-md-align-left l-lg-align-left">
                                                        <img class="g-img" src="https://cdn.evbstatic.com/s3-build/perm_001/4f9188/django/images/pages/add_to_facebook/fb-connect-my-fb-page-screen.png" data-d-retina-src="https://cdn.evbstatic.com/s3-build/perm_001/6f6a24/django/images/pages/add_to_facebook/fb-connect-my-fb-page-screen@2x.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="g-group l-mar-top-6">
                                            <div class="g-cell g-cell-12-12 g-cell--no-gutters text-body--faint">
                                                <p>
                                                    Important:
                                                </p>
                                                <li class="l-mar-top-3">
                                                    Your event is added to the Facebook Page you select, not your personal profile.
                                                </li>
                                                <li class="l-mar-top-3">
                                                    After you connect to your Facebook account, you can view and edit details before publishing.
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </div>
                    </section>
                    <section class="js-switch-region" data-automation="fb-switch-region"></section>
                    <section class="js-unqualified-region"></section>
                    <section class="js-publish-region"></section>
                </div>
            </div>
        </section>
    </div>
@endsection