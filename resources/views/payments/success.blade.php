@extends('layouts.master')
@section('title', "Successful Checkout ")
@section('content')
    <div class="page-wrapper thankyou-page">
        <div class="page-container">

            <div class="form-wrapper">

                <div class="flex-center position-ref thankyou-content">
                    <div class="content">
                        <div class="title">

                            <div class="stoppable">
                                <img src="{{asset('images/tick.png')}}" class="tick-gif" width="100">
                            </div>
                            <h4>Congratulations!</h4>
                            <p>You've purchased the ticket Successfully. <br>Below are your Purchase Details.</p>
                        </div>
                        <div class="payment-details">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Ticket Name</td>
                                        <td>{{$orderDetails->ticket->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Transaction ID</td>
                                        <td>{{$orderDetails->transaction_id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Amount Paid</td>
                                        <td>${{$orderDetails->payment_gross}}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status</td>
                                        <td>{{$orderDetails->payment_status}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p class="login-link">
                            <a class="btn btn-success rounded-border" href="{{url('events/'.$orderDetails->event->encrypted_id.'/'.$orderDetails->ticket->time_location->encrypted_id)}}">Go Back to Event Page</a>
                        </p>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection