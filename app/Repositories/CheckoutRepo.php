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

    public function storeOrderDetails($userId, $ticket, $orderDetails, $charge){
        $qty = (int) $orderDetails['quantity'];
        $order = [
            'event_id'      =>      $ticket->event->id,
            'user_id'       =>      $userId,
            'ticket_id'     =>      $ticket->id,
            'quantity'      =>      $qty,
            'ticket_price'  =>      $ticket->price,
            'payment_method'=>      $orderDetails['payment_method']
        ];

        if($orderDetails['payment_method'] == 'stripe'){
            $order['transaction_id']           =       $charge['id'];
            $order['payment_gross']            =       $charge['amount']/100;
            $order['currency_code']            =       $charge['currency'];
            $order['payment_status']           =       $charge['status'];
        }

        $newOrder = $this->eventOrderModel->create($order);
        return $newOrder;
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
        if($type == 'paypal'){
            $orderDetails = $this->eventOrderModel->where('paypal_token', $data['TOKEN'])->first();

            $orderDetails->transaction_id           =       $data['PAYMENTINFO_0_TRANSACTIONID'];
            $orderDetails->payment_gross            =       $data['PAYMENTINFO_0_AMT'];
            $orderDetails->currency_code            =       $data['PAYMENTINFO_0_CURRENCYCODE'];
            $orderDetails->payment_status           =       $data['PAYMENTINFO_0_PAYMENTSTATUS'];

            $orderDetails->save();
            return $orderDetails;
        }else{
            $orderDetails = $this->eventOrderModel->find($orderId);

            $orderDetails->transaction_id           =       $data['id'];
            $orderDetails->payment_gross            =       $data['amount']/100;
            $orderDetails->currency_code            =       $data['currency'];
            $orderDetails->payment_status           =       $data['status'];

            $orderDetails->save();
            return $orderDetails;
        }

    }

    public function updateOrderOnCancellation($orderId){
        return $this->eventOrderModel->where('id', $orderId)->update(['payment_status' => 'Cancelled']);
    }
}