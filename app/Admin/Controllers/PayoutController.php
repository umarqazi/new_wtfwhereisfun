<?php

namespace App\Admin\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\PayoutRequest;
use App\Services\Events\EventTimeLocationService;
use App\Services\PayoutDetailService;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\AdaptivePayments;

class PayoutController extends Controller
{
    /**
     * @var AdaptivePayments
     */
    protected $stripe;

    /**
     * @var EventTimeLocationService
     */
    protected $eventLocationService;

    /**
     * @var PayoutDetailService
     */
    protected $payoutDetailService;

    /**
     * PayoutController constructor.
     */
    public function __construct()
    {
        $this->paypal                       = new AdaptivePayments;
        $this->eventLocationService         = new EventTimeLocationService();
        $this->payoutDetailService          = new PayoutDetailService();
    }

    /**
     * @param PayoutRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function payout(PayoutRequest $request){
        $hash = randomHash();
        $success_url= url()->current().'-success/'.$hash;
        $data = [
            'receivers'  => [
                [
                    'email' => $request->email,
                    'amount' => $request->amount,
                ]
            ],
            'payer' => 'EACHRECEIVER',
            'return_url' => $success_url,
            'cancel_url' => url()->current(),
        ];
        $response = $this->paypal->createPayRequest($data);
        if(isset($response['error'])){
            return redirect()->back()->withErrors(['email' => [$response['error'][0]['message']]]);
        }
        else{
            $url = url()->current();
            $url= explode('/',$url);
            $this->payoutDetailService->create(['paykey' => $response['payKey'], 'event_time_locations_id' => intval($url[7]), 'transaction_id' => 1, 'status' => 0, 'token' => $hash, 'payment_status' =>  'PAY-KEY-GENERATED']);
            $redirect_url = $this->paypal->getRedirectUrl('approved', $response['payKey']);
            return redirect($redirect_url);
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getPaymentDetails(){
        $url = url()->current();
        $url= explode('/',$url);
        $payoutDetails = $this->payoutDetailService->fetch(['event_time_locations_id' => $url[7], 'token' => end($url)]);
        $details = $this->paypal->getPaymentDetails($payoutDetails->paykey);
        $this->payoutDetailService->updateOrCreate(
            [
                'event_time_locations_id' => $url[7],
                'token' => end($url)
            ],
            [
                'status'            => 1,
                'transaction_id'    => $details['paymentInfoList']['paymentInfo'][0]['senderTransactionId'],
                'amount'            => $details['paymentInfoList']['paymentInfo'][0]['receiver']['amount'],
                'payment_status'    =>  $details['status'],
                'token'             => ''
            ]
        );
        array_splice($url,count($url) - 2);
        $url = implode('/',$url);
        return redirect($url);
    }

}
