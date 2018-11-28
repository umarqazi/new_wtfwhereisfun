@extends('layouts.email-master')
@section('title', "Reset Password :: Where's the fun")
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

                                                <!-- Image Section -->
                                                <table border="0" width="100%" align="center" cellpadding="0" cellspacing="0" style="width:100%;max-width:100%;">
                                                    <tr>
                                                        <td class="imgResponsive" align="center" valign="middle" style="padding:0;">
                                                            <a href="{{url('/')}}" style="text-decoration:none;border:0">
                                                                <img src="{{asset('img/email-images/resetpassword.png')}}" alt="#" border="0" width="500" style="display:block;border:0;width:100%;max-width:500px">
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
                                                            @if(!empty($reset_password->user->first_name))
                                                                Hello {{$reset_password->user->first_name}},
                                                            @else
                                                                Hello {{$reset_password->user->email}},
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="sectionTitle centerText" align="center" valign="middle" style="font-family:'Montserrat',Arial,Helvetica,sans-serif;color:#191919;font-size:22px;line-height:30px;font-weight:700;letter-spacing:0px;padding:0;padding-bottom:20px;">
                                                            Reset Your Password
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
                                                            Somebody (hopefully you) requested a new password for the {{Config::get('constants.SITE_NAME')}} account. No changes
                                                            have been made to your account yet. You can reset your password by clicking the link below.
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

                                    <!-- Table Container 1 Column Open // -->
                                    <table class="row" width="600" border="0" cellpadding="0" cellspacing="0" align="center" style="width:600px;max-width:600px;">
                                        <tr>
                                            <td align="center" valign="middle">
                                                <table class="centerFloat" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td class="contBtn" align="center" style="background-color:#86C543;border-radius:45px;padding:8px 20px 8px 20px;display:inline-block;">
                                                            <a href="{{url('reset-password/'.$reset_password->token)}}" target="_blank" style="font-family:'Open Sans',Arial,Helvetica,sans-serif;color:#FFFFFF;font-size:12px;line-height:20px;font-weight:700;letter-spacing:0.5px;text-align:center;text-decoration:none;">RESET PASSWORD</a>
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
<!-- Single Center Button 1 Section Close // -->
@endsection