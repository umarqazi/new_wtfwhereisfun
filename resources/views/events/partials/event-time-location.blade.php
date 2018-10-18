@if(count($locations))
    <div class="tickets_details tickets_location">
        <h4>Event times and locations</h4>

        @foreach($locations as $location)
            <div class="description_details row">
                <ul class="col-md-6 col-xs-12 clearfix">

                    <li><strong><i class="fa fa-calendar"></i>Event Start Date</strong></li>
                    <li><span>{{$location->starting}}</span></li>

                    <li><strong><i class="fa fa-calendar"></i>Event End Date</strong></li>
                    <li><span>{{$location->ending}}</span></li>

                    <li><strong><i class="fa fa-map-marker"></i>Event Location</strong></li>
                    <li><span>{{$location->location}}</span></li>

                    <li><strong><i class="fa fa-location-arrow"></i>Event Address</strong></li>
                    <li><span>{{$location->address}}</span></li>
                    @if(!is_null($location->display_currency))
                        <li><strong><i class="fa fa-money"></i>Display Currency</strong></li>
                        <li><span>{{$location->display_currency->code}}</span></li>
                    @endif

                    @if(!is_null($location->transacted_currency))
                        <li><strong><i class="fa fa-money"></i>Transacted Currency</strong></li>
                        <li><span>{{$location->transacted_currency->symbol.' '.$location->transacted_currency->code}}</span></li>
                    @endif

                    @if(!is_null($location->timezone))
                        <li><strong><i class="fa fa-clock-o"></i>Time Zones</strong></li>
                        <li><span>{{$location->timezone->text}}</span></li>
                    @endif

                </ul>
                <div class="col-md-6 col-xs-12">
                    <div class="map_wrapper">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3403.33974839611!2d74.27330795036306!3d31.459838981298414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391903e9fe073afd%3A0xcec14940bde5aec4!2sTechverx!5e0!3m2!1sen!2s!4v1538987087344" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endif
