    <style>

        table{
            font-family: Arial, Helvetica, sans-serif;
        }

        table tr td{
            padding: 5px;
        }
        table td p{
            margin-top: 0px;
        }
        strong{
            text-align: left;
            font-weight:600;
            font-size:16px;
        }
        table td h4{
            /*margin-top: 0px;*/
            color:#86C543;
        }

        table td{
            margin-top: 10px;
        }
    </style>
    <div style="border: 3px solid #474749;">
        <table width="100%" style="border-collapse: collapse;">
            <tr style="background:#474749" height="250px">
                <td style="color:#fff; padding: 10px 20px;">
                    <h2 style="margin-bottom: 0px;">This is your Ticket</h2>
                    <p style="margin-top: 0px;">Present this ticket page at the event</p>
                </td>
                <td style="text-align: right; vertical-align: middle; padding: 10px 20px;"><img src="{{asset('img/logos/stub-logo.png')}}"  width="150px"></td>
            </tr>
        </table>
        <table width="100%" style="border-collapse: collapse; background: #f3f3f3; border-bottom: solid 2px #fff;">
            <tr>
                <td style="padding: 15px;">
                    <p style="color:#86C543;">
                        <strong>Event</strong>
                    </p>
                </td>
                <td style="padding: 15px;">
                    <p class="">{{$order->event->title}}</p>
                </td>

                <td style="padding: 15px;">
                    <p style="color:#86C543;"><strong>Event Organizer</strong></p>
                </td>
                <td style="padding: 15px;">
                    <p class="">{{$order->event->organizer->name}}</p>
                </td>
            </tr>

            <tr>
                <td style="padding: 15px;">
                    <p style="color:#86C543;"><strong>Organizer Contact</strong></p>
                </td>
                <td style="padding: 15px;">
                    <p>
                        {{$order->event->organizer->contact}}
                    </p>
                </td>
                <td style="padding: 15px;">
                    <p style="color:#86C543;"><strong>Organizer Page</strong></p>
                </td>
                <td style="padding: 15px;" colspan="">
                    <p class="">
                        <a href="{{url('/').'/organizer/'.$order->event->organizer->slug}}">Visit Organizer Page</a>
                    </p>
                </td>

            </tr>

        </table>

        <table style="min-width: 100%; border-collapse: collapse;">
            <tr>
                <td style="border: solid 1px #eee; width: 55%; background: #efefef; padding: 10px; border-right: #fff solid 3px; vertical-align: top;">
                    <h3 style="color: #5aa92a; font-weight: 600; border-bottom: #c1c1c1 solid 1px; padding-bottom: 10px;">Event Details</h3>
                    <div style="border-right: #c1c1c1 solid 1px; width: 30%; display: inline-block; padding: 15px 0px; vertical-align: top;">

                        <p style="padding: 10px; margin-bottom:0px;">Event Name : </p>
                        <p style="padding: 10px; margin-bottom:0px;">Ticket Name : </p>
                        <p style="padding: 10px; margin-bottom:0px;">Event Location : </p>
                        <p style="padding: 10px; margin-bottom:0px;">Event Date : </p>
                        <p style="padding: 10px; margin-bottom:0px;">Event Time : </p>
                    </div>

                    <div style=" display: inline-block; padding: 15px 0px;  width: 68%; vertical-align: top">
                        <p style="padding: 10px; margin-bottom:0px;">{{$order->event->title}}</p>
                        <p style="padding: 10px; margin-bottom:0px;">{{$order->ticket->name}}</p>
                        <p style="padding: 10px; margin-bottom:0px;">{{$order->ticket->time_location->location}}</p>
                        <p style="padding: 10px; margin-bottom:0px;">{{$order->ticket->time_location->starting->format('D, M d')}} - {{$order->ticket->time_location->ending->format('D, M d')}}</p>
                        <p style="padding: 10px; margin-bottom:0px;">{{$order->ticket->time_location->starting->format('g:i A')}}  - {{$order->ticket->time_location->ending->format('g:i A')}}</p>
                    </div>
                </td>

                <td style="border: solid 1px #eee; background: #e4e4e4; padding: 10px;">
                    <h3 style="color: #5aa92a; font-weight: 600; border-bottom: #c1c1c1 solid 1px; padding-bottom: 10px;">Order Information</h3>
                    <div style="border-right: #c1c1c1 solid 1px; width: 30%; display: inline-block; padding: 15px 0px; vertical-align: top">
                        <p style="padding: 10px; margin-bottom:0px;">Order Info : </p>
                        <p style="padding: 10px; margin-bottom:0px;">Amount Paid : </p>
                        <p style="padding: 10px; margin-bottom:0px;">Ticket Quantity : </p>
                        <p style="padding: 10px; margin-bottom:0px;">Ticket Price : </p>
                        <p style="padding: 10px; margin-bottom:0px;">Order Status : </p>
                    </div>

                    <div style=" display: inline-block; padding: 15px 0px; vertical-align: top; width: 68%">
                        <p style="padding: 10px; margin-bottom:0px;">Order #{{$order->id}}. Ordered By {{$order->user->first_name}} on {{monthDateYearFromat($order->created_at)}} {{$order->created_at->format('g:i A')}}</p>
                        <p style="padding: 10px; margin-bottom:0px;">${{$order->payment_gross}}</p>
                        <p style="padding: 10px; margin-bottom:0px;">{{$order->quantity}}</p>
                        <p style="padding: 10px; margin-bottom:0px;">${{$order->ticket_price}}</p>
                        <p style="padding: 10px; margin-bottom:0px;">{{ucfirst($order->payment_status)}}</p>
                    </div>
                </td>
            </tr>
        </table>

        <table width="100%" style="border-collapse: collapse; margin: 20px 0px 0px;">
            <tr>
                <td style="text-align:center;"><img src="{{$path.$order->qr_image}}" height="200px" width="200px"></td>
            </tr>
        </table>
    </div>