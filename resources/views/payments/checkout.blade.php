<!------ Include the above in your HEAD tag ---------->
@extends('layouts.master')
@section('title', "Checkout ")
@section('content')
    <script src="https://js.stripe.com/v3/"></script>
    <div class="container checkout-page">
        <div class="row">
            <form method="POST" name="checkout_form" id="checkout-form" onsubmit="completeCheckout(event, this)" action="{{url('checkout/proceed')}}">
                {{ csrf_field() }}
                <div class="col-md-9">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                    </div>
                                    <div class="col-xs-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table cart-table">
                                            <tr class="table-head">
                                                <td>Image</td>
                                                <td>Name</td>
                                                <td>Detail</td>
                                                <td>Location</td>
                                                <td>Dates</td>
                                                <td>Time</td>
                                                <td>QTY</td>
                                                <td>Price</td>
                                            </tr>

                                            <tr>
                                                <td class="ticket-img">
                                                    @if(!empty($ticket->event->header_image))
                                                        <img class="img-responsive" src="{{$directory['web_path'].$ticket->event->header_image}}">
                                                    @else
                                                        <img class="img-responsive" src="{{asset('img/dummy.jpg')}}">
                                                    @endif

                                                </td>
                                                <td>{{$ticket->name}}<input type="hidden" name="ticket_id" value="{{encrypt_id($ticket->id)}}"></td>
                                                <td class="ticket-detail"><p>{{$ticket->description}}</p></td>
                                                <td>{{$ticket->time_location->location}}</td>
                                                <td>{{$ticket->time_location->starting->format('D, M Y')}} - {{$ticket->time_location->ending->format('D, M Y')}}</td>
                                                <td>{{$ticket->time_location->starting->format('g:i A')}} - {{$ticket->time_location->ending->format('g:i A')}}</td>
                                                <td>
                                                    <div class="sp-quantity">
                                                        <div class="sp-minus"> <a class="quantity-button" type="button"><i class="fa fa-minus"></i></a>
                                                        </div>
                                                        <div class="sp-input">
                                                            <input type="text" class="quntity-input" value="1" name="quantity" readonly />
                                                        </div>
                                                        <div class="sp-plus"> <a class="quantity-button" type="button"><i class="fa fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="hidden" value="{{$ticket->price}}" id="ticket-price">
                                                    <strong>{{$ticket->time_location->transacted_currency->code.' '.$ticket->time_location->transacted_currency->symbol.$ticket->price}}</strong>
                                                </td>
                                            </tr>
                                            <?php $service_fee = number_format((($ticket->price * 1.25 / 100) + 0.99), 2);?>
                                            <?php $processing_fee = number_format(((($ticket->price + $service_fee) * 2.9 / 100) + .30), 2);?>

                                            @if($eventHotDeal['hotDeal'])
                                                <tr class="hot-deal">
                                                    <td colspan="6">Discount</td>
                                                    <td colspan="2">
                                                        <span class="text-right hot-deal-text" ><strong id="hot-deal-value">{{$eventHotDeal['details']->discount}}%</strong></span>
                                                        <input type="hidden" value="{{$eventHotDeal['details']->discount}}" id="discount">
                                                    </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td colspan="6">Stubguys fee</td>
                                                <td colspan="2">
                                                    <h4 class="text-right sub-total"><input class="service_fee" name="service_fee" value="<?php echo $ticket->time_location->transacted_currency->symbol.$service_fee;?>"></h4>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="6">Total</td>
                                                <td colspan="2">
                                                    <h4 class="text-right sub-total">
                                                        @if($eventHotDeal['hotDeal'])
                                                            @php
                                                                $discount = ((($ticket->price + $service_fee) * $eventHotDeal['details']->discount) / 100);
                                                                $total = number_format(($ticket->price + $service_fee ) - $discount, 2)
                                                            @endphp
                                                            <strong id="total-price">{{$ticket->time_location->transacted_currency->code.' '.$ticket->time_location->transacted_currency->symbol}} <span class="ticket-price">{{$total}} </span></strong>
                                                        @else
                                                            <?php $total = number_format(($ticket->price + $service_fee ), 2)?>
                                                            <strong id="total-price">{{$ticket->time_location->transacted_currency->code.' '.$ticket->time_location->transacted_currency->symbol}} <span class="ticket-price">{{$total}} </span></strong>
                                                        @endif
                                                    </h4>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="6">Processing Fee</td>
                                                <td colspan="2">
                                                    <h4 class="text-right sub-total"><input class="processing_fee" name="processing_fee" value="<?php echo $ticket->time_location->transacted_currency->symbol.$processing_fee;?>"></h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">Grand Total</td>
                                                <td colspan="2">
                                                    <h4 class="text-right sub-total">
                                                        @if($eventHotDeal['hotDeal'])
                                                            @php
                                                                $discount = ((($ticket->price) * $eventHotDeal['details']->discount) / 100);
                                                            @endphp
                                                            <strong id="total-price">{{$ticket->time_location->transacted_currency->code.' '.$ticket->time_location->transacted_currency->symbol}} <span class="grand-ticket-price">{{number_format($total + $processing_fee, 2)}} </span></strong>
                                                        @else
                                                            <strong id="total-price">{{$ticket->time_location->transacted_currency->code.' '.$ticket->time_location->transacted_currency->symbol}} <span class="grand-ticket-price">{{number_format($total + $processing_fee, 2)}} </span></strong>
                                                        @endif
                                                    </h4>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <div class="row">

                                <div class="col-xs-8">
                                    <div class="form-row">
                                        <label for="card-element" class="card-element-label">
                                            Credit or debit card
                                            <span class="images">
                                                <img src="{{asset('img/cards/visa.png')}}">
                                                <img src="{{asset('img/cards/master.png')}}">
                                                <img src="{{asset('img/cards/diner.png')}}">
                                                <img src="{{asset('img/cards/discover.png')}}">
                                                <img src="{{asset('img/cards/union.png')}}">
                                            </span>
                                        </label>
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>

                                </div>

                                <div class="col-xs-4">
                                    <button type="submit" class="btn btn-success btn-block submit rounded-border">Checkout</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="user-details">
                        <h4>Customer Details</h4>
                        @if(Auth::user())
                            <div class="logged-in-user-details">
                                <p>
                                    <strong>Customer Name : </strong> <span>{{Auth::user()->first_name}}</span>
                                    <br>
                                    <strong>Email : </strong> <span>{{Auth::user()->email}}</span>
                                    <input name="user_status" type="hidden" value="logged_in">
                                </p>
                            </div>
                        @else
                            <div>
                                <input name="user_status" type="radio" id="radio_6" value="old" class="with-gap" onchange="getUserForm(this)" checked required>
                                <label for="radio_6">
                                    Already a User?
                                </label>
                            </div>

                            <div>
                                <input name="user_status" type="radio" id="radio_7" value="new" class="with-gap" onchange="getUserForm(this)">
                                <label for="radio_7">
                                    Create New Account
                                </label>
                            </div>

                            <div class="user-detail-form">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="login-email" name="email" placeholder="Email Address" required >
                                </div>
                                <div class="form-error email"></div>
                            </div>

                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        var qtyleft = {{$ticketQuantityLeft}};
    </script>
    <script src="{{asset('js/custom/checkout.js')}}" type="text/javascript"></script>
@endsection