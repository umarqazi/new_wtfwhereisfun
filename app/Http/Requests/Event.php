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
            'discount'          => 'required_if:referral_code,any'
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
            'organizer_id.required'  => 'Please select an Organizer',
            'discount.required_if'   => 'Discount is required',
            'discount.integer'       => 'Please enter percentage of discount in numbers'
        ];
    }
}
