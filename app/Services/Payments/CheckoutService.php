<?php
namespace App\Services\Payments;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServices;
use App\Services\Events\EventTicketService;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Repositories\CheckoutRepo;
use Cartalyst\Stripe\Stripe;
class CheckoutService
{
    protected $userServices;
    protected $ticketService;
    protected $paypalProvider;
    protected $checkoutRepo;
    protected $stripeProvider;

    public function __construct()
    {
        $this->userServices     = new UserServices;
        $this->ticketService    = new EventTicketService;
        $this->paypalProvider   = new ExpressCheckout;
        $this->checkoutRepo     = new CheckoutRepo;
        $this->stripeProvider   = new Stripe(env('STRIPE_API_KEY', 'sk_test_iTNTzvLIxH136Q6MjRZ3dmM0'));
    }

    public function handleCheckoutUser($request){
        if(Auth::user()){
            $user = Auth::user();
        }else{
            if($request->user_status == 'old'){
                $user = $this->userServices->getUserByEmail($request->email);
            }else{
                $user = $this->userServices->register($request);
            }
        }

        return $user->id;
    }

    public function storeOrder($orderDetails, $userId, $ticket, $charge = null){
        $order = $this->checkoutRepo->storeOrderDetails($userId, $ticket, $orderDetails, $charge);
        return $order;
    }

    public function storeStripeOrder(){

    }

    public function pay($orderDetails){
        $data  = $this->getCheckoutData(false, $orderDetails);
        $response = $this->paypalProvider->setExpressCheckout($data);
        $this->checkoutRepo->setOrderToken($orderDetails->id, $response['TOKEN']);
        return $response['paypal_link'];
    }

    public function completeStripeProcess($data, $ticket){
        $charge = $this->stripeProvider->charges()->create([
            'source'    => $data['stripeToken'],
            'currency'  => 'USD',
            'amount'    => $ticket->price * (int) $data['quantity']
        ]);
        return $charge;
    }

    public function success($request){
        $orderDetails       = $this->checkoutRepo->getOrderByToken($request['token']);
        $data               = $this->getCheckoutData(false, $orderDetails);
        $payment_status     = $this->paypalProvider->doExpressCheckoutPayment($data, $request['token'], $request['PayerID']);
        $orderDetails       = $this->checkoutRepo->updateOrderOnSuccess($payment_status, 'paypal');
        return $orderDetails;
    }

    public function cancelOrder($token){
        $order = $this->checkoutRepo->getOrderByToken($token);
        $this->checkoutRepo->updateOrderOnCancellation($order->id);
    }

    /**
     * Set cart data for processing payment on PayPal.
     *
     * @param bool $recurring
     *
     * @return array
     */
    protected function getCheckoutData($recurring = false, $order)
    {
        $data = [];
        if ($recurring === true) {
            $data['items'] = [
                [
                    'name'  => 'Monthly Subscription '.config('paypal.invoice_prefix').' #',
                    'price' => 0,
                    'qty'   => 1,
                ],
            ];
            $data['return_url'] = url('/paypal/ec-checkout-success?mode=recurring');
            $data['subscription_desc'] = 'Monthly Subscription '.config('paypal.invoice_prefix').' #';
        } else {
            $data['items'] = [
                [
                    'name'  => $order->ticket->name,
                    'price' => $order->ticket->price,
                    'qty'   => $order->quantity
                ],
            ];
            $data['return_url'] = url('checkout/success');
        }
        $data['invoice_id'] = 'ORDER-'.$order->id.'-'.$order->ticket->id;
        $data['invoice_description'] = $order->ticket->description;
        $data['cancel_url'] = url('checkout/cancel');
        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $data['total'] = $total;
        return $data;
    }


}