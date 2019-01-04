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
        $data = [
            'receivers'  => [
                [
                    'email' => $request->email,
                    'amount' => $request->amount,
                    'primary' => true,
                ],
                [
                    'email' => 'jazib.javed@gems.techverx.com',
                    'amount' => $request->amount,
                    'primary' => false
                ]
            ],
            'payer' => 'EACHRECEIVER',
            'return_url' => url(''),
            'cancel_url' => url(''),
        ];

        $response = $this->stripe->createPayRequest($data);
        if(isset($response['error'])){
            return redirect()->back()->withErrors(['email' => [$response['error'][0]['message']]]);
        }
        if(isset($response['success'])){
            Alert('Payout Successfull!','success');
            return redirect()->back();
        }
    }
}
