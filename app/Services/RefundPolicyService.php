<?php
namespace App\Services;

use App\Repositories\RefundPolicyRepo;
use App\Services\BaseService;
use App\Services\Events\EventOrderService;
use App\Services\IDBService;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Alert;
class RefundPolicyService extends BaseService implements IDBService
{
    protected $refundPolicyRepo;
    protected $eventOrderService;
    protected $stripeProvider;

    public function __construct( ){
        $this->refundPolicyRepo         = new RefundPolicyRepo;
        $this->eventOrderService        = new EventOrderService;
        $this->stripeProvider           = new Stripe(env('STRIPE_API_KEY', 'sk_test_iTNTzvLIxH136Q6MjRZ3dmM0'));
    }


    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
    }

    public function search($request)
    {
        // TODO: Implement search() method.
    }

    public function getAll()
    {
        return $this->refundPolicyRepo->getAll();
    }

    public function refundOrder($orderId){
        $order      = $this->eventOrderService->getOrderById($orderId);
        $starting   = $order->ticket->time_location->starting;
        $refundDays = $order->event->refund_policy->days;
        if(($order->event->refund_policy->days != 0) && (Carbon::now() <= getTicketRefundDays($starting, $refundDays))){
            $refund = $this->stripeProvider->refunds()->create($order->transaction_id);
            $this->eventOrderService->updateRefundOrderDetails($orderId, $refund);
            Alert::success('Your Order has been refunded Successfully!', 'Order Refunded');
            return true;
        }else{
            Alert::success('Something went Wrong! Please try again', 'Failed');
            return false;
        }
    }
}