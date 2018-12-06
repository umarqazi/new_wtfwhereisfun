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
    <table width="100%" style="border-collapse: collapse;">
        <tr style="background:#474749" height="250px">
            <td style="color:#fff;">
                <h2 style="margin-bottom: 0px;">This is your Ticket</h2>
                <p style="margin-top: 0px;">Present this ticket page at the event</p>
            </td>
            <td style="text-align: right; vertical-align: middle"><img src="{{asset('img/logos/stub-logo.png')}}"  width="150px"></td>
        </tr>
    </table>
    <table width="100%" style="border-collapse: collapse;">
        <tr style="padding-left:20px;">
            <td style="">
                <p style="color:#86C543;"><strong>Event</strong></p>
            </td>
            <td style="">
                <p class="">{{$order->event->title}}</p>
            </td>

            <td style="">
                <p style="color:#86C543;"><strong>Event Organizer</strong></p>
            </td>
            <td style="">
                <p class="">{{$order->event->organizer->name}}</p>
            </td>
        </tr>

        <tr style="padding-left:20px;">
            <td style="">
                <p style="color:#86C543;"><strong>Organizer Contact</strong></p>
            </td>
            <td style="">
                <p class="">
                    {{$order->event->organizer->contact}}
                </p>
            </td>
            <td style="">
                <p style="color:#86C543;"><strong>Organizer Page</strong></p>
            </td>
            <td style="" colspan="">
                <p class="">
                    <a href="{{url('/').'/'.$order->event->organizer->slug}}">Visit Organizer Page</a>
                </p>
            </td>

        </tr>

    </table>

    <table style="min-width: 100%; border-collapse: collapse; margin-top: 20px">
        <tr>
            <td style="border: solid 1px #eee; width: 65%; background: #e2e3e5; padding: 10px;">
                <h3>Event Details</h3>
                <p><strong>Event Name : </strong>{{$order->event->title}}</p>
                <p><strong>Ticket Name : </strong>{{$order->ticket->name}}</p>
                <p><strong>Event Location : </strong>{{$order->ticket->time_location->location}}</p>
                <p><strong>Event Date : </strong>{{$order->ticket->time_location->starting->format('D, M d')}} - {{$order->ticket->time_location->ending->format('D, M d')}}</p>
                <p><strong>Event Time : </strong>{{$order->ticket->time_location->starting->format('g:i A')}}  - {{$order->ticket->time_location->ending->format('g:i A')}}</p>
            </td>
            <td style="width: 20px"></td>
            <td style="border: solid 1px #eee; background: #b1b2b3; padding: 10px">
                <h3>Order Information</h3>
                <p><strong>Order Info : </strong>Order #{{$order->id}}. Ordered By {{$order->user->first_name}} on {{monthDateYearFromat($order->created_at)}} {{$order->created_at->format('g:i A')}}</p>
                <p><strong>Amount Paid : </strong>${{$order->payment_gross}}</p>
                <p><strong>Ticket Quantity : </strong>${{$order->quantity}}</p>
                <p><strong>Ticket Price : </strong>${{$order->ticket_price}}</p>
                <p><strong>Order Status : </strong>{{ucfirst($order->payment_status)}}</p>
            </td>
        </tr>
    </table>

    <table width="100%" style="border-collapse: collapse; margin: 20px 0px 0px;">
        <tr>
            <td style="text-align:center; border: solid 1px #eee;"><img src="{{$path.$order->qr_image}}" height="200px" width="200px"></td>
        </tr>
    </table>
