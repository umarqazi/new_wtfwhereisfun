@extends('layouts.master')
@section('title', "Where's the fun")
<!-- ______________________ Start Main Content __________________ -->
<div id="maincontent" class="main-content">
    <section class="signup-signin-section">
        <div class="container">
            <div class="signup-signin-wrap">
                <div class="tablist-wrap">
                    <ul class="nav nav-tabs" role="tablist">
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" >
                            <div class="singin-form-wrap">
                                <h3 class="forgot-pass-title">Forgot Password</h3>
                                <form method="post" id="forgot-form" action="{{url('do-forgot-password')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                                    </div>
                                    <button type="submit" class="btn btn-default forgot-btn">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="sign-up">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><!-- /.main-content -->