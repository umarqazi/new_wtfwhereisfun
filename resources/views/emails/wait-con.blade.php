@extends('layouts.email-master')
@section('title', "Ticket Wait List Notification")
@section('content')

    <!-- Image Column Section Open // -->
    <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
        <tr>
            <td class="bodyBgColor" align="center" valign="top" bgcolor="#F9F9F9">
                <!-- Bg Color Open // -->
                <table class="row" border="0" width="700" align="center" cellpadding="0" cellspacing="0" style="width:700px;max-width:700px;">
                    <tr>
                        <td class="whiteBgColor" align="center" valign="top" bgcolor="#FFFFFF">
                            <!-- E-mail Container Section Open // -->
                            <table class="row" border="0" width="700" align="center" cellpadding="0" cellspacing="0" style="width:700px;max-width:700px;">
                                <tr>
                                    <td class="containerPadding" align="center" valign="top">

                                        <!-- Table Container 1 Column Open // -->
                                        <table class="row" border="0" width="700" align="center" cellpadding="0" cellspacing="0" style="width:700px;max-width:700px;">
                                            <tr>
                                                <td align="center" valign="middle" style="font-size:0;padding:0">
                                                @php
                                                    $link = route('showById', ['id' => $waitList->ticket->event->encrypted_id, 'locationId' => $waitList->ticket->time_location->encrypted_id ]);
                                                @endphp
                                                <!-- Image Section -->
                                                    <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                                        <tr>
                                                            <td class="imgResponsive" align="center" valign="middle" style="padding:0;">
                                                                <a href="{{$link}}" style="text-decoration:none;border:0;">
                                                                    <img src="{{asset('img/email-images/notificationbell.png')}}" alt="#" border="0" width="290" style="display:block;border:0;width:100%;max-width:290px">
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Table Container 1 Column Close // -->

                                    </td>
                                </tr>
                            </table>
                            <!-- E-mail Container Section Close // -->
                        </td>
                    </tr>
                </table>
                <!-- Bg Color Close // -->
            </td>
        </tr>
    </table>
    <!-- Image Column Section Close // -->

    <!-- Title, Subtitle and Description Section Open // -->
    <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
        <tr>
            <td class="bodyBgColor" align="center" valign="top" bgcolor="#F9F9F9">
                <!-- Bg Color Open // -->
                <table class="row" border="0" width="700" align="center" cellpadding="0" cellspacing="0" style="width:700px;max-width:700px;">
                    <tr>
                        <td class="whiteBgColor" align="center" valign="top" bgcolor="#FFFFFF">
                            <!-- E-mail Container Section Open // -->
                            <table class="row" width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;max-width:600px;">
                                <tr>
                                    <td class="container-padding" align="center" valign="top">

                                        <!-- Space Open -->
                                        <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                            <tr>
                                                <td align="center" valign="middle" height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- Space Close -->

                                        <!-- Table Container 1 Column Open // -->
                                        <table class="row" width="600" border="0" cellpadding="0" cellspacing="0" align="center" style="width:600px;max-width:600px;">
                                            <tr>
                                                <td align="center" valign="middle" style="font-size:0;padding:0">

                                                    <!-- Title Section // -->
                                                    <table class="row" border="0" width="500" align="center" cellpadding="0" cellspacing="0" style="width:500px;max-width:500px;">
                                                        <tr>
                                                            <td class="sectionSubTitle centerText" align="center" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#86C543;font-size:12px;line-height:20px;font-weight:700;letter-spacing:0.5px;padding:0;padding-bottom:5px;">
                                                                Wait List Notification
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="sectionTitle centerText" align="center" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#191919;font-size:22px;line-height:30px;font-weight:700;letter-spacing:0px;padding:0;padding-bottom:20px;">
                                                                Hello {{$waitList->name}}!
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" valign="middle" style="padding:0;padding-bottom:20px;">
                                                                <table border="0" cellpadding="0" cellspacing="0" width="80" align="center">
                                                                    <tr>
                                                                        <td align="center" style="border-bottom:1px solid #86C543;font-size:0;line-height:0;">&nbsp;
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="sectionDesc centerText" align="center" valign="middle" style="font-family:'Open Sans',Arial,Helvetica,sans-serif;color:#939393;font-size:14px;line-height:22px;font-weight:400;letter-spacing:0px;">
                                                                {!! $waitingListSetting->auto_respond_msgs !!}
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Table Container 1 Column Close // -->

                                        <!-- Space Open -->
                                        <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                            <tr>
                                                <td align="center" valign="middle" height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- Space Close -->

                                    </td>
                                </tr>
                            </table>
                            <!-- E-mail Container Section Close // -->
                        </td>
                    </tr>
                </table>
                <!-- Bg Color Close // -->
            </td>
        </tr>
    </table>
    <!-- Title, Subtitle and Description Section Close // -->

    <!-- Single Center Button 1 Section Open // -->
    <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
        <tr>
            <td class="bodyBgColor" align="center" valign="top" bgcolor="#F9F9F9">
                <!-- Bg Color Open // -->
                <table class="row" border="0" width="700" align="center" cellpadding="0" cellspacing="0" style="width:700px;max-width:700px;">
                    <tr>
                        <td class="whiteBgColor" align="center" valign="top" bgcolor="#FFFFFF">
                            <!-- E-mail Container Section Open // -->
                            <table class="row" width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;max-width:600px;">
                                <tr>
                                    <td class="container-padding" align="center" valign="top">

                                        <!-- Space Open -->
                                        <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                            <tr>
                                                <td align="center" valign="middle" height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- Space Close -->

                                        <!-- Space Open -->
                                        <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                            <tr>
                                                <td align="center" valign="middle" height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- Space Close -->

                                    </td>
                                </tr>
                            </table>
                            <!-- E-mail Container Section Close // -->
                        </td>
                    </tr>
                </table>
                <!-- Bg Color Close // -->
            </td>
        </tr>
    </table>
    <!-- Single Center Button 1 Section Close // -->

    <!-- Event Info With Left Boxed Image Section Open // -->
    <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
        <tr>
            <td class="bodyBgColor" align="center" valign="top" bgcolor="#F9F9F9">
                <!-- Bg Color Open // -->
                <table class="row" border="0" width="700" align="center" cellpadding="0" cellspacing="0" style="width:700px;max-width:700px;">
                    <tr>
                        <td class="whiteBgColor" align="center" valign="top" bgcolor="#FFFFFF">
                            <!-- E-mail Container Section Open // -->
                            <table class="row" width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;max-width:600px;">
                                <tr>
                                    <td class="container-padding" align="center" valign="top">

                                        <!-- Space Open -->
                                        <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                            <tr>
                                                <td align="center" valign="middle" height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- Space Close -->

                                        <!-- Table Container 2 Column Open // -->
                                        <table class="row" width="600" border="0" cellpadding="0" cellspacing="0" align="center" style="width:600px;max-width:600px;">
                                            <tr>
                                                <td align="center" valign="middle" style="font-size:0;padding:0">

                                                    <!--[if (gte mso 9)|(IE)]><table border="0" cellpadding="0" cellspacing="0"><tr><td valign="middle"><![endif]-->

                                                    <div class="row" style="display:inline-block;max-width:290px;vertical-align:middle;width:100%">

                                                        <!-- Image 1 Column // -->
                                                        <table class="row" border="0" width="290" align="left" cellpadding="0" cellspacing="0" style="width:290px;max-width:290px;">
                                                            <tr>
                                                                <td align="center" valign="middle">

                                                                    <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                                                        <tr>
                                                                            <td class="imgResponsive" align="center" valign="middle">
                                                                                <a href="{{$link}}" style="text-decoration:none;border:0;">
                                                                                    @if(!empty($waitList->ticket->event->header_image))
                                                                                        @php
                                                                                            $image = $waitList->ticket->event->directory.$waitList->ticket->event->header_image;
                                                                                        @endphp
                                                                                    @else
                                                                                        @php
                                                                                            $image = asset('img/dummy.jpg');
                                                                                        @endphp
                                                                                    @endif
                                                                                    <img src="{{$image}}" alt="#" border="0" width="290" style="display:block;border:0;width:100%;max-width:290px">
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </div>

                                                    <!--[if (gte mso 9)|(IE)]></td><td valign="middle"><![endif]-->

                                                    <div class="row" style="display:inline-block;max-width:20px;vertical-align:middle;width:100%">

                                                        <!-- Gap Section Open // -->
                                                        <table class="row" width="20" border="0" cellpadding="0" cellspacing="0" align="left" style="width:20px;max-width:20px;">
                                                            <tr>
                                                                <td align="center" valign="middle" height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                                                            </tr>
                                                        </table>

                                                    </div>

                                                    <!--[if (gte mso 9)|(IE)]></td><td valign="middle"><![endif]-->

                                                    <div class="row" style="display:inline-block;max-width:290px;vertical-align:middle;width:100%">
                                                        <!-- Text 2 Column // -->
                                                        <table class="row" border="0" width="290" align="left" cellpadding="0" cellspacing="0" style="width:290px;max-width:290px;">
                                                            <tr>
                                                                <td align="center" valign="middle">

                                                                    <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                                                        <tr>
                                                                            <td class="infosubTitle centerText" align="left" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#86C543;font-size:12px;line-height:20px;font-weight:700;letter-spacing:0.5px;padding:0;">
                                                                                DATE &amp; TIME
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="infoTitle centerText" align="left" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#191919;font-size:16px;line-height:24px;font-weight:700;letter-spacing:0px;padding:0;">
                                                                                {{$waitList->ticket->time_location->starting->format('D, M d')}} -
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="infoTitle centerText" align="left" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#191919;font-size:16px;line-height:24px;font-weight:700;letter-spacing:0px;padding:0;">
                                                                                {{$waitList->ticket->time_location->ending->format('D, M d')}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="infoDesc cen5terText" align="left" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#939393;font-size:16px;line-height:24px;font-weight:400;letter-spacing:0px;padding:0;padding-bottom:20px;">
                                                                                {{$waitList->ticket->time_location->starting->format('g:i A')}}  - {{$waitList->ticket->time_location->ending->format('g:i A')}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="infosubTitle centerText" align="left" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#86C543;font-size:12px;line-height:20px;font-weight:700;letter-spacing:0.5px;padding:0;">
                                                                                LOCATION
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="infoTitle centerText" align="left" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#191919;font-size:16px;line-height:24px;font-weight:700;letter-spacing:0px;padding:0;">
                                                                                {{$waitList->ticket->time_location->location}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="infosubTitle centerText" align="left" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#86C543;font-size:12px;line-height:20px;font-weight:700;letter-spacing:0.5px;padding:0;">
                                                                                Status
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="infoTitle centerText" align="left" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#191919;font-size:16px;line-height:24px;font-weight:700;letter-spacing:0px;padding:0;">
                                                                                Waiting
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </div>

                                                    <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->

                                                </td>
                                            </tr>
                                        </table>
                                        <!-- Table Container 2 Column Close // -->

                                        <!-- Space Open -->
                                        <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                            <tr>
                                                <td align="center" valign="middle" height="30" style="font-size:30px;line-height:30px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <!-- Space Close -->

                                    </td>
                                </tr>
                            </table>
                            <!-- E-mail Container Section Close // -->
                        </td>
                    </tr>
                </table>
                <!-- Bg Color Close // -->
            </td>
        </tr>
    </table>
    <!-- Event Info With Left Boxed Image Section Close // -->
@endsection