<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentInfo extends FormRequest
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
            'payment_method'             => 'required',
            'payment_email'              => 'required_if:payment_method,paypal',
            'confirm_payment_email'      => 'required_if:payment_method,paypal|required_with:payment_email|same:payment_email',
            'bank_name'                  => 'required_if:payment_method,stripe',
            'account_number'             => 'required_if:payment_method,stripe',
            're_enter_account_number'    => 'required_if:payment_method,stripe|required_with:account_number|same:account_number',
            'account_title'              => 'required_if:payment_method,stripe',
            'routing_number'             => 'required_if:payment_method,stripe',
            'account_holder'             => 'required_if:payment_method,stripe',
            'account_type'               => 'required_if:payment_method,stripe',
            'bank_currency'              => 'required_if:payment_method,stripe',
            'bank_address'               => 'required_if:payment_method,stripe',
            'bank_country'               => 'required_if:payment_method,stripe',
            'bank_state'                 => 'required_if:payment_method,stripe',
            'bank_zipcode'               => 'required_if:payment_method,stripe',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'payment_email.same' => 'Confirm Email must be same as Email',
        ];
    }
}
