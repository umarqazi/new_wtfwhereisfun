@extends('layouts.master')
@section('title', "Checkout :: Where's the fun ")
@section('content')

    <div class="stripe-checkout">
        <div class="stripe-content">
            <div class="logo">
                <img src="{{asset('images/stripe-logo.png')}}" width="200" height="200">
            </div>
            <p>You're only one step away to purchase this ticket.
                <br>
                Please Click on below button to pay through stripe
            </p>
            <form action="{{url('checkout/stripe')}}" method="post">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{env('STRIPE_PUBLISHABLE_KEY', 'pk_test_kllUqSb2Dk8DG1r20FTr2nEg')}}"
                        data-description="{{$ticket->description}}"
                        data-amount="{{$ticket->price * $orderDetails['quantity'] * 100}}"
                        data-locale="auto"
                        data-image="{{asset('images/wtf-stripe.png')}}"
                        data-name="{{$ticket->name}}"
                ></script>
                <input type="hidden" name="payment_method" value="{{$orderDetails['payment_method']}}">
                <input type="hidden" name="user_status" value="{{$orderDetails['user_status']}}">
                @if(isset($orderDetails['email']))
                    <input type="hidden" name="email" value="{{$orderDetails['email']}}">
                @endif
                @if(isset($orderDetails['password']))
                    <input type="hidden" name="password" value="{{$orderDetails['password']}}">
                @endif
                <input type="hidden" name="quantity" value="{{$orderDetails['quantity']}}">
                <input type="hidden" name="ticket_id" value="{{encrypt_id($ticket->id)}}">
            </form>
        </div>
    </div>
@endsection