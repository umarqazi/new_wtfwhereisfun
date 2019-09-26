<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'payment_email'              => 'email|required',
            'confirm_payment_email'      => 'email|required|required_with:payment_email|same:payment_email',
            'payment_method'             => 'required',
            'bank_name'                   => 'required',
            'account_number'             => 'required',
            'account_title'              => 'required',
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
