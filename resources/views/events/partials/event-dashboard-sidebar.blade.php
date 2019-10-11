<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            @if(!empty($event->header_image))
                <img src="{{$event->directory.$event->header_image}}" width="48" height="48" alt="Event" style="height:50px;" />
            @else
                <img src="{{asset('img/default-148.png')}}" width="48" height="48" alt="Event" style="height:50px;"/>
            @endif
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="active open"> <a href="{{url('events/'.$location->encrypted_id.'/dashboard')}}"><span>Event Dashboard</span></a>
            </li>
            {{--<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Payment</span> </a>
                <ul class="ml-menu">
                    <li> <a href="javascript:void(0)">Payment Options</a></li>
                    <li> <a href="javascript:void(0)">Taxes &amp; Invoices</a></li>
                    <li> <a href="javascript:void(0)">Fees</a></li>
                </ul>
            </li>--}}

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Order Options</span> </a>
                <ul class="ml-menu">
                    <li> <a href="{{url('events/'.$location->encrypted_id.'/dashboard/orders')}}">All Orders</a></li>
{{--                    <li> <a href="javascript:void(0)">Order Confirmation</a></li>--}}
                    <li> <a href="{{url('events/'.$location->encrypted_id.'/dashboard/wait-list-settings')}}">Wait List Settings</a></li>
                    <li> <a href="{{url('events/'.$location->encrypted_id.'/dashboard/wait-list')}}">Wait List</a></li>
                    <li> <a href="{{url('events/'.$location->encrypted_id.'/dashboard/guest-list')}}">Guest List</a></li>
                </ul>
            </li>

            {{--<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Marketing Automation</span> </a>
                <ul class="ml-menu">
                    <li> <a href="javascript:void(0)">Social Post</a></li>
                    <li>
                        <a href="{{url('events/'.$location->encrypted_id.'/dashboard/add-to-facebook')}}">
                            Add to Facebook
                        </a>
                    </li>
                    <li> <a href="javascript:void(0)">Email Marketing</a></li>
                    <li> <a href="javascript:void(0)">Event Blog Post</a></li>
                    <li> <a href="javascript:void(0)">Contacts</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Attendees Management</span> </a>
                <ul class="ml-menu">
                    <li> <a href="javascript:void(0)">Attendee List</a></li>
                    <li> <a href="javascript:void(0)">Add Attendees</a></li>
                    <li> <a href="javascript:void(0)">Guest List</a></li>
                    <li> <a href="javascript:void(0)">Check in</a></li>
                    <li> <a href="javascript:void(0)">Name Badges</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Events Stats</span> </a>
                <ul class="ml-menu">
                    <li> <a href="javascript:void(0)">Tracking Links</a></li>
                    <li> <a href="javascript:void(0)">Event Reports</a></li>
                    <li> <a href="javascript:void(0)">Analytics &amp; Charts</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);"><span>Duplicate Event</span></a>
            <li> <a href="javascript:void(0);"><span>Delete Event</span></a>--}}

        </ul>
    </div>
    <!-- #Menu -->
</aside>