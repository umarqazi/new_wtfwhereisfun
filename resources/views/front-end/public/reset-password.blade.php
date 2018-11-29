@extends('layouts.master')
@section('title', "Where's the fun")
@section('content')
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
                                    <h3 class="forgot-pass-title">Enter your new password here</h3>
                                    <form method="post" id="forgot-form" action="{{url('do-reset-password')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" name="password_confirmation"
                                                   placeholder="Confirm Password" required>
                                        </div>
                                        <input type="hidden" name="token" value="{{$reset_password->token}}">
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
@endsection