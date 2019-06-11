<?php
namespace App\Services\Payments;

use App\Services\Events\EventService;
use App\Services\Events\EventTicketService;
use Carbon\Carbon;
use Cartalyst\Stripe\Stripe;
class StripeService
{
    protected $stripeProvider;
    protected $eventService;
    protected $eventTicketService;

    public function __construct()
    {
        $this->stripeProvider           = new Stripe(env('STRIPE_API_KEY', 'sk_test_iTNTzvLIxH136Q6MjRZ3dmM0'));
        $this->eventService             = new EventService();
        $this->eventTicketService       = new EventTicketService();
    }

    /**
     * Create a new Stripe Product of an Event.
     *
     * @param  \Illuminate\Http\ $eventId
     * @param  \Illuminate\Http\ $type
     * @return \Illuminate\Http\Response
     */
    public function createStripeProduct($eventId, $type){
        $event          = $this->eventService->getByID($eventId);
        $stripeProduct  = [
            'name'        => $event->title.' - '.$event->vendor->first_name.' '.$event->vendor->last_name.'('.$event->vendor->email.')',
            'description' => 'Event hosted by '.$event->vendor->first_name.' '.$event->vendor->last_name.'('.$event->vendor->email.')',
            'shippable'   => false,
        ];
        if($type == 'store'){
            $stripeProduct['attributes']  = ['location', 'ticket'];
            $product    = $this->stripeProvider->products()->create($stripeProduct);
            $response   = $this->eventService->updateStripeProductId($event->id, $product);
        }else{
            $product    = $this->stripeProvider->products()->update($event->stripe_product_id, $stripeProduct);
        }
        return $product;
    }

    /**
     * Create a new Stripe Product SKU for a Ticket.
     *
     * @param  \Illuminate\Http\ $ticketId
     * @param  \Illuminate\Http\ $type
     * @return \Illuminate\Http\Response
     */
    public function createStripeSku($ticketId, $type){
        $ticket  = $this->eventTicketService->getTicketDetails($ticketId);
        $data    = [
            'product'   => $ticket->event->stripe_product_id,
            'price'     => $ticket->total_price,
            'currency'  => strtolower($ticket->time_location->transacted_currency->code),
            'inventory' => [
                'type'     => 'finite',
                'quantity' => $ticket->quantity
            ],
            'attributes' => [
                'location'      => $ticket->time_location->location,
                'ticket'        => $ticket->name
            ],
        ];
        if($type == 'store'){
            $sku        = $this->stripeProvider->skus()->create($data);
            $response   = $this->eventTicketService->updateTicketSkuId($ticket->id, $sku);
        }else{
            $sku        = $this->stripeProvider->skus()->update($ticket->stripe_sku_id, $data);
        }
        return $sku;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function createStripeCoupon($request){
        $coupon = $this->stripeProvider->coupons()->create([
            'duration'      => 'once',
            'percent_off'   => $request->discount,
            'redeem_by'     => strtotime(Carbon::now()->addHours($request->hours)),
            'name'          => $request->discount.'% OFF For '.$request->hours.''
        ]);
        return $coupon;
    }



}