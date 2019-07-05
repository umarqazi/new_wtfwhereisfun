<footer id="footer" class="footer">
    <div class="container">
        <div class="footer-wrap row">
            <div class="footer-col-1 footer-colum-wrap col-md-3 col-sm-6 col-xs-12">
                <div class="footer-colum-inner">
                    <h4 class="footer-colum-title">Pages</h4>
                    <div class="ft-pages-list-wrap">
                        <ul class="ft-pages-list list-simple">
                            <li><a href="{{url('about-us')}}">About Us</a></li>
                            <li><a href="{{url('terms-conditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Services</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.footer-col-1 -->
            <div class="footer-col-2 footer-colum-wrap col-md-3 col-sm-6 col-xs-12">
                <div class="footer-colum-inner">
                    <h4 class="footer-colum-title">The Highlights</h4>
                    <div class="ft-pages-list-wrap">
                        <ul class="ft-highlights-list list-simple">
                            <li><a href="{{url('all-categories')}}">Dinner</a></li>
                            <li><a href="{{url('all-categories')}}">Restaurants</a></li>
                            <li><a href="{{url('all-categories')}}">Hotel</a></li>
                            <li><a href="{{url('all-categories')}}">Coffee</a></li>
                            <li><a href="{{url('all-categories')}}">Club & bar</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.footer-col-2 -->
            <div class="footer-col-3 footer-colum-wrap col-md-3 col-sm-6 col-xs-12">
                <div class="footer-colum-inner">
                    <h4 class="footer-colum-title">Events</h4>
                    <div class="ft-pages-list-wrap">
                        <ul class="ft-Events-list list-simple">
                            <li><a href="{{url('all-categories')}}">HEAT – End Of Season Pool Party</a></li>
                            <li><a href="{{url('all-categories')}}">We Love Bass 2017</a></li>
                            <li><a href="{{url('all-categories')}}">Andrew Kasab</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.footer-col-3 -->
            <div class="footer-col-1 footer-colum-wrap col-md-3 col-sm-6 col-xs-12">
                <div class="footer-colum-inner">
                    <h4 class="footer-colum-title">My Account</h4>
                    <div class="ft-pages-list-wrap">
                        <ul class="ft-Account-list list-simple">
                            @if(auth()->user())
                                <li><a href="{{url('dashboard')}}">Dashboad</a></li>
                                <li><a href="{{url('my-events')}}">Events</a></li>
                            @else
                                <li><a href="{{url('search')}}">Listings</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div><!-- /.footer-col-4 -->
        </div><!-- /.footer-wrap -->
    </div>
    <div class="footer-copyright-section container-fluid">
        <div class="footer-copyright-wrap">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-copyright-dis">Copyright © Stubguys</div>
                </div>
            </div>
        </div>
    </div>
</footer>
