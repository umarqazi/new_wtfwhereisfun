<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout;
use App\Services\Events\EventTicketService;
use App\Services\Payments\CheckoutService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
class PaymentController extends Controller
{
    protected $eventTicketService;
    protected $checkoutService;

    public function __construct()
    {
        $this->eventTicketService  = new EventTicketService();
        $this->checkoutService     = new CheckoutService();
    }

    public function checkout(Request $request){
        $ticketDetails = $this->eventTicketService->getTicketDetails($request->ticket_id);
        $directory = getDirectory('events', $ticketDetails->event->id);
        return View('payments.checkout')->with(['ticket' => $ticketDetails, 'directory' => $directory]);
    }

    public function validateCheckout(Checkout $request){
        return response()->json([
            'type'      =>  'success',
            'msg'       =>  'Successfully Verified',
            'data'      =>  true
        ]);
    }

    public function completeCheckout(Request $request){
        $ticket     = $this->eventTicketService->getTicketDetails(decrypt_id($request->ticket_id));
        if($request->payment_method == 'paypal'){
            $userId     = $this->checkoutService->handleCheckoutUser($request);
            $order      = $this->checkoutService->storeOrder($request->all(), $userId, $ticket);
            $response   = $this->checkoutService->pay($order);
            return redirect($response);
        }else{
            return View('payments.stripe-checkout')->with(['orderDetails' => $request->all(), 'ticket' => $ticket]);
        }
    }

    public function stripeCheckout(Request $request){
        $userId     = $this->checkoutService->handleCheckoutUser($request);
        $ticket     = $this->eventTicketService->getTicketDetails(decrypt_id($request->ticket_id));
        $charge     = $this->checkoutService->completeStripeProcess($request->all(), $ticket);
        $response   = $this->checkoutService->storeOrder($request, $userId, $ticket, $charge);
        return View('payments.success')->with('orderDetails', $response);
    }

    public function notifyCheckout(Request $request){
        // Import the namespace Srmklive\PayPal\Services\ExpressCheckout first in your controller.
        $provider = new ExpressCheckout;

        $request->merge(['cmd' => '_notify-validate']);
        $post = $request->all();

        $response = (string) $provider->verifyIPN($post);

        if ($response === 'VERIFIED') {

        }
    }

    public function successCheckout(Request $request){
        $response = $this->checkoutService->success($request->all());
        return View('payments.success')->with('orderDetails', $response);
    }

    public function cancelCheckout(Request $request){
        $this->checkoutService->cancelOrder($request['token']);
        return redirect(url()->previous());
    }

}
