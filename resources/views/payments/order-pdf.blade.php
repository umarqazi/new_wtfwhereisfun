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
            margin-top: 0px;
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
    <table width="100%" style="border-collapse: collapse; border: solid 1px #eee;">
        <tr style="padding-left:20px;">
            <td style="border: solid 1px #eee;">
                <h4 class="pull-left">Event</h4>
            </td>
            <td style="border: solid 1px #eee;">
                <p class="">{{$order->event->title}}</p>
            </td>

            <td style="border: solid 1px #eee;">
                <h4 class="pull-left">Ticket</h4>
            </td>
            <td style="border: solid 1px #eee;">
                <p class="">{{$order->ticket->name}}</p>
            </td>


        </tr>

        <tr style="padding-left:20px;">
            <td style="border: solid 1px #eee;">
                <h4 class="pull-left">Date + Time</h4>
            </td>
            <td style="border: solid 1px #eee;">
                <p class="">
                    {{$order->ticket->time_location->starting->format('D, M d')}} - {{$order->ticket->time_location->ending->format('D, M d')}}
                    <br>{{$order->ticket->time_location->starting->format('g:i A')}}  - {{$order->ticket->time_location->ending->format('g:i A')}}
                </p>
            </td>

            <td style="border: solid 1px #eee;">
                <h4 class="pull-left">Location</h4>
            </td>
            <td style="border: solid 1px #eee;">
                <p class="">{{$order->ticket->time_location->location}}</p>
            </td>


        </tr>

        <tr style="padding-left:20px;">
            <td style="border: solid 1px #eee;">
                <h4 class="pull-left">Order Info</h4>
            </td>
            <td style="border: solid 1px #eee;">
                <p class="">Order #{{$order->id}}. Ordered By {{$order->user->first_name}} on {{monthDateYearFromat($order->created_at)}} {{$order->created_at->format('g:i A')}}</p>
            </td>

            <td style="border: solid 1px #eee;">
                <h4 class="pull-left">Payment Status</h4>
            </td>
            <td style="border: solid 1px #eee;">
                <p class="">{{$order->payment_status}}</p>
            </td>


        </tr>

        <tr style="padding-left:20px;">
            <td style="border: solid 1px #eee;">
                <h4 class="pull-left">Ticket Quantity</h4>
            </td>
            <td style="border: solid 1px #eee;">
                <p class="">{{$order->quantity}}</p>
            </td>

            <td style="border: solid 1px #eee;">
                <h4 class="pull-left">Amount Paid</h4>
            </td>
            <td style="border: solid 1px #eee;">
                <p class="">${{$order->payment_gross}}</p>
            </td>


        </tr>
    </table>

    <table width="100%" style="border-collapse: collapse; margin: 20px 0px 0px; border: solid 1px #eee;">
        <tr>
            <td style="text-align:center; border: solid 1px #eee;"><img src="{{$path.$order->qr_image}}" height="200px" width="200px"></td>
        </tr>
    </table>
