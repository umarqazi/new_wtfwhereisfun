@extends('layouts.master')
@section('title', "Where's the fun:: Contact Us")
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
                            <div role="tabpanel" class="tab-pane active" id="sign-in">
                                <div class="singin-form-wrap">
                                    <form method="post" id="contact-form">
                                        <div class="form-group">
                                            <label for="name">Your Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject">Subject:</label>
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Message:</label>
                                            <textarea class="form-control" rows="10" placeholder="Your Message" name="message"></textarea>
                                        </div>
                                        <button type="submit" class="btn  btn-default sign-in-btn contact-btn">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- /.main-content -->

@endsection