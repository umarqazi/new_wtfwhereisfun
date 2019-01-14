@extends('layouts.master')
@section('title', "Contact Us ")
@section('content')
    <!-- ______________________ Start Main Content __________________ -->
    <div id="maincontent" class="main-content">
        <section class="signup-signin-section">
            <div class="container contact-wrap">
                <div class="signup-signin-wrap">
                    <div class="tablist-wrap">
                        <h2 class="contactUs_title">Contact Us</h2>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="singin-form-wrap">
                                <form method="post" id="contact-form">
                                    <div class="form-group">
                                        <label for="name">Your Name<span class="required-field">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="">
                                        <div class="form-error name"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email<span class="required-field">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="">
                                        <div class="form-error email"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Subject<span class="required-field">*</span></label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                        <div class="form-error subject"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Message<span class="required-field">*</span></label>
                                        <textarea class="form-control" rows="10" placeholder="Your Message" name="message" required></textarea>
                                        <div class="form-error message"></div>
                                    </div>
                                    <button type="submit" class="btn  btn-default sign-in-btn contact-btn">Send</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- /.main-content -->

    <script src="{{asset('js/custom/contact-us.js')}}"></script>

@endsection