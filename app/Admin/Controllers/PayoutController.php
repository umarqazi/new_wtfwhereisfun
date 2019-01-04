<?php

namespace App\Admin\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\PayoutRequest;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\AdaptivePayments;

class PayoutController extends Controller
{
    /**
     * @var AdaptivePayments
     */
    protected $stripe;

    /**
     * PayoutController constructor.
     */
    public function __construct()
    {
        $this->stripe   = new AdaptivePayments;
    }

    /**
     * @param PayoutRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function payout(PayoutRequest $request){
        $success_url= url()->current();
        $data = [
            'receivers'  => [
                [
                    'email' => $request->email,
                    'amount' => $request->amount,
                    'primary' => true,
                ],
                [
                    'email' => 'jazib.javed-buyer@gems.techverx.com',
                    'amount' => $request->amount,
                    'primary' => false
                ]
            ],
            'payer' => 'EACHRECEIVER',
            'return_url' => url(),
            'cancel_url' => url($success_url),
        ];

        $response = $this->stripe->createPayRequest($data);
        if(isset($response['error'])){
            return redirect()->back()->withErrors(['email' => [$response['error'][0]['message']]]);
        }
        else{
            $redirect_url = $this->stripe->getRedirectUrl('approved', $response['payKey']);
            return redirect($redirect_url);
        }
    }
}
