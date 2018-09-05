<!-- login modals -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal modified-login-logout fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="signup-signin-wrap">
                    <div class="tablist-wrap">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="sign-in">
                                <p class="text-center"><img src="{{asset('/images/logo/wtf-logo.png')}}"></p>
                                <ul class="nav nav-tabs text-center" role="tablist">
                                    <li role="presentation" class="active"><a href="#sign-in" aria-controls="sign-in" role="tab" data-toggle="tab">Sign In</a></li>
                                </ul>
                                <div class="checkbox dont-accont text-center clearfix">
                                    <label>Don't have an Account?</label>
                                    <label role="presentation" class="ragister" ><a href="" class="signup-main-btn" data-toggle="modal" data-target="#signup" aria-controls="Sign-Up" role="tab" data-toggle="tab">Sign Up</a></label>
                                </div>
                                <div class="singin-form-wrap">
                                    <form method="post" id="login-form" class="serialize-form">
                                        <div class="form-group">
                                            <label for="email">Email address:</label>
                                            <input type="email" class="form-control" id="login-email" name="email"
                                                   placeholder="Email Address" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Password:</label>
                                            <input type="password" class="form-control prevent-copy-paste"
                                                   name="password" id="login-pwd" placeholder="Password" required="">
                                        </div>
                                        <div class="checkbox-feild-wrap">
                                            <input type="checkbox" id="announcements" name="remember_me" value="true" />
                                            <label for="announcements">Remember me</label>
                                            <label class="lost-pwd"><a href="{{url('forgot-password')}}">Lost your
                                            password</a></label>
                                        </div>
                                        <button type="submit" class="btn  btn-default sign-in-btn login-btn">Sign in</button>

                                        <div class="othr-signin">
                                            <a href="javascript:void(0);" onclick="fbLogin()" class="btn btn-default facebook-btn">Connect with Facebook</a>
                                            <a class="btn  btn-default google-btn" href="{{url('hauth/login/Google')}}">Connect with Google</a>
                                            <a class="btn  btn-default linkedin-btn" href="{{url('hauth/login/LinkedIn')}}">Connect with Linkedin</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal modified-login-logout fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="signup-signin-wrap">
                    <ul class="nav nav-tabs text-center" role="tablist">
                        <li role="presentation" class="active"><a href="#sign-in" aria-controls="sign-in" role="tab" data-toggle="tab">Sign Up</a></li>
                    </ul>
                    <div class="checkbox dont-accont text-center clearfix">
                        <label>Already have an account?</label>
                        <label role="presentation" class="ragister" ><a class="login-main-btn"  data-toggle="modal" data-target="#login">Sign In</a></label>
                    </div>
                    <div class="sign-up-wrap">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active personal-tab">
                                <a class="show-personal" aria-controls="sign-in" role="tab" data-toggle="tab">Personal</a>
                            </li>
                            <li role="presentation" class="org-tab">
                                <a class="show-org" aria-controls="sign-in" role="tab" data-toggle="tab">Organization</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="personal">
                                <form method="post" id="signup-form" class="signup-form">
                                    <div class="signup-fields">
                                        <label class="sign-up-dis">Your account detail will be confirmed via email.</label>
                                        <div class="form-group user_first_name">
                                            <label for="username">First Name</label>
                                            <input type="name" required class="form-control" name="first_name" placeholder="First Name">
                                        </div>
                                        <div class="form-group user_last_name">
                                            <label for="username">Last Name</label>
                                            <input type="name" required class="form-control" name="last_name" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" required class="form-control" id="normal-email" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Password:</label>
                                            <input type="password" required class="form-control prevent-copy-paste" id="normal-pwd" name="password" placeholder="Password">
                                        </div>
                                        <div class="checkbox clearfix">
                                            <label class="terms-condition">By creating an account you agree to our <a
                                                        target="_blank" href="{{url('terms-conditions')}}">Terms and
                                                    Condition</a> and our <a target="_blank" href="{{url
                                                     ('privacy-policy')}}">Privacy Policy</a></label>
                                        </div>
                                    </div>
                                    <div class="othr-signin">
                                        <button type="submit" class="btn btn-default signup-btn">Sign up</button>
                                        <a href="javascript:void(0);" onclick="fbLogin()" class="btn btn-default facebook-btn">Connect with Facebook</a>
                                        <a class="btn  btn-default google-btn" href="{{url('hauth/login/Google')}}">Connect with Google</a>
                                        <a class="btn  btn-default linkedin-btn" href="{{url('hauth/login/LinkedIn')}}">Connect with Linkedin</a>
                                    </div>
                                </form>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="organization">
                                <form method="post" id="org-signup-form" class="signup-form" >
                                    <div class="signup-fields">
                                        <label class="sign-up-dis">Your account detail will be confirmed via email.</label>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" required class="form-control" id="org-email" name="email"
                                                   placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="name" class="form-control" id="org-username"
                                                   name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Password:</label>
                                            <input type="password" required class="form-control prevent-copy-paste"
                                                   id="org-pwd" name="password" placeholder="Password">
                                        </div>
                                        <div class="checkbox clearfix">
                                            <label class="terms-condition">By creating an account you agree to our <a
                                                        target="_blank" href="{{url('terms-conditions')}}">Terms and
                                                    Condition</a> and our <a target="_blank" href="{{url('privacy-policy')}}">Privacy Policy</a></label>
                                        </div>
                                    </div>
                                    <div class="othr-signin">
                                        <button type="submit" class="btn btn-default signup-btn">Sign up</button>
                                        <a href="javascript:void(0);" onclick="fbLogin()" class="btn btn-default facebook-btn">Connect with Facebook</a>
                                        <a class="btn  btn-default google-btn" href="{{url('hauth/login/Google')}}">Connect with Google</a>
                                        <a class="btn  btn-default linkedin-btn" href="{{url('hauth/login/LinkedIn')}}">Connect with Linkedin</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>

</script>