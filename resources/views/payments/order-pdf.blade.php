
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
        }

        table tr td {
            padding: 5px;
        }

        table td p {
            margin-top: 0px;
        }

        strong {
            text-align: left;
            font-weight: 600;
            font-size: 16px;
        }

        table td h4 {
            /*margin-top: 0px;*/
            color: #86C543;
        }

        table td {
            margin-top: 10px;
        }

    </style>
    <div style="border: 3px solid #474749;">
        <table width="100%" style="border-collapse: collapse;">
            <tr style="background:#474749" height="250px">
                <td style="color:#fff; padding: 10px 20px;">
                    <h2 style="margin-bottom: 20px;">{{$order->event->title}}</h2>
                    <p style="color: #86c543; font-weight: 600; width: 100%;display: block; vertical-align: top;">
                        <span style=" display:block; width: 100%; color:#fff;">Order Information</span>
                        <span>Order #{{$order->id}}. Ordered By {{$order->user->first_name}} on {{monthDateYearFromat($order->created_at)}} {{$order->created_at->format('g:i A')}}
                        </span>
                    </p>
                    <p style="color: #86c543; font-weight: 600; width: 100%;display: block; vertical-align: top;">
                        <span style=" display:block; width: 100%;color:#fff;" >Location</span>
                        <span>{{$order->ticket->time_location->location}}</span>
                    </p>
                </td>
                <td style="text-align: right; vertical-align: middle; padding: 10px 20px;"><img src="{{asset('img/logos/stub-logo.png')}}" width="150px"></td>
            </tr>
        </table>


        <table style="min-width: 100%; border-collapse: collapse;">
            <tr>
                <td style="border: solid 1px #eee; width: 65%; background: #efefef; padding: 30px; border-right: #fff solid 3px; vertical-align: top">
                    <p><span style="width: 30%; display: inline-block">Event Ticket</span> <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">{{$order->ticket->name}}</span></p>
                    <p><span style="width: 30%; display: inline-block">Order Status</span> <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">{{ucfirst($order->payment_status)}}</span></p>
                    <p>
                        <span style="width: 30%; display: inline-block">Event Date :</span>
                        <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">{{$order->ticket->time_location->starting->format('D, M d')}}</span>
                        <span style="display: inline-block; padding: 0px 5px">To</span>
                        <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">{{$order->ticket->time_location->ending->format('D, M d')}}</span>
                    </p>

                    <p>
                        <span style="width: 30%; display: inline-block">Event Time :</span>
                        <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">{{$order->ticket->time_location->starting->format('g:i A')}}</span>
                        <span style="display: inline-block; padding: 0px 5px">To</span>
                        <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">{{$order->ticket->time_location->ending->format('g:i A')}}</span>
                    </p>

                    <p><span style="width: 30%; display: inline-block">Amount Paid</span> <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">${{$order->payment_gross}}</span></p>
                    <p><span style="width: 30%; display: inline-block">Ticket Qty</span> <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">{{$order->quantity}}</span></p>
                    <p><span style="width: 30%; display: inline-block">Ticket Price</span> <span style="color: #7caf3e; border: #c7c7c7 solid 1px; padding: 5px 20px; background: #fff; font-size: 13px; font-weight: 600;">${{$order->ticket_price}}</span></p>
                </td>
                <td style="border: solid 1px #eee; background: #e4e4e4; padding: 30px; text-align: center;">
                    <img src="{{$path.$order->qr_image}}" height="200px" width="200px">
                </td>
            </tr>
        </table>

        <table width="100%" style="border-collapse: collapse; margin: 20px 0px 0px;">
            <tr>
                <td style="padding: 5px 0px 20px 0px; text-align: center;">
                    <span>
                        @if(!empty($order->event->organizer->contact))
                            Call Us: {{$order->event->organizer->contact}}
                        @endif
                    </span>
                </td>
            </tr>
        </table>
    </div>
