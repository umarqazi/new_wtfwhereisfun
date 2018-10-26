<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Event extends FormRequest
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
            'title'             => 'required|string|max:75',
            'description'       => 'required',
            'organizer_id'      => 'required',
            'discount'          => 'required_with:referral_code,numeric',
            'contact'           => ''
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
            'organizer_id.required'     => 'Please select an Organizer',
            'discount.required_with'    => 'Discount is required',
        ];
    }
}
