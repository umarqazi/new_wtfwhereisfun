<?php

namespace App\Repositories;

use App\EventOrder;
class CheckoutRepo
{
    protected $eventOrderModel;

    public function __construct()
    {
        $this->eventOrderModel  = new EventOrder;
    }

    public function storeOrderDetails($userId, $ticket, $orderDetails, $stripeOrder){
        $qty = (int) $orderDetails['quantity'];

        if (mb_substr($orderDetails['processing_fee'], 0, 1) == '₡'){
            $processing_fee = str_replace('₡', '', $orderDetails['processing_fee']);
            $stubguys_fee = str_replace('₡', '', $orderDetails['service_fee']);
        } else{
            $processing_fee = substr($orderDetails['processing_fee'],1);
            $stubguys_fee = substr($orderDetails['service_fee'],1);
        }

        $order = [
            'event_id'              =>      $ticket->event->id,
            'user_id'               =>      $userId,
            'ticket_id'             =>      $ticket->id,
            'quantity'              =>      $qty,
            'ticket_price'          =>      $ticket->price,
            'payment_method'        =>      'stripe',
            'transaction_id'        =>      $stripeOrder['charge'],
            'payment_gross'         =>      $stripeOrder['amount']/100,
            'currency_code'         =>      $stripeOrder['currency'],
            'payment_status'        =>      $stripeOrder['status'],
            'stripe_order_id'       =>      $stripeOrder['id'],
            'stripe_processing_fee' =>      $processing_fee,
            'stubguys_fee'          =>      $stubguys_fee
        ];

        if($ticket->time_location->hot_deal()->exists()){
            $order['is_deal_availed']      = 1;
            $order['discount']             = $ticket->time_location->hot_deal->discount;
            $order['hot_deal_id']          = $ticket->time_location->hot_deal->id;
        }

        return $this->eventOrderModel->create($order);
    }

    public function setOrderToken($orderId, $token){
        $order = $this->eventOrderModel->find($orderId);
        $order->paypal_token = $token;
        $order->save();
        return $order;
    }

    public function getOrderByToken($token){
        return $this->eventOrderModel->where('paypal_token', $token)->first();
    }

    public function getOrderById($orderId){
        return $this->eventOrderModel->find($orderId);
    }

    public function updateOrderOnSuccess($data, $type, $orderId = null){
        $orderDetails = $this->eventOrderModel->where('paypal_token', $data['TOKEN'])->first();

        $orderDetails->transaction_id           =       $data['PAYMENTINFO_0_TRANSACTIONID'];
        $orderDetails->payment_gross            =       $data['PAYMENTINFO_0_AMT'];
        $orderDetails->currency_code            =       $data['PAYMENTINFO_0_CURRENCYCODE'];
        $orderDetails->payment_status           =       $data['PAYMENTINFO_0_PAYMENTSTATUS'];

        $orderDetails->save();
        return $orderDetails;
    }

    public function updateOrderOnCancellation($orderId){
        return $this->eventOrderModel->where('id', $orderId)->update(['payment_status' => 'Cancelled']);
    }
}