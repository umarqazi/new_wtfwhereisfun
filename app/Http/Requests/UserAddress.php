<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddress extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shipping_address'  =>  'required|string',
            'shipping_country'  =>  'required|integer',
            'shipping_state'    =>  'required|integer',
            'shipping_city'     =>  'required|integer',
            'billing_address'   =>  'required_if:is_billing_shipping,false',
            'billing_country'   =>  'required_if:is_billing_shipping,false|integer',
            'billing_state'     =>  'required_if:is_billing_shipping,false|integer',
            'billing_city'      =>  'required_if:is_billing_shipping,false|integer',
        ];
    }
}
