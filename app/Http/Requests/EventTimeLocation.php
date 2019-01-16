<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventTimeLocation extends FormRequest
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
            'event_location'            =>          'required|string',
            'latitude'                  =>          'required',
            'longitude'                 =>          'required',
            'event_address'             =>          'required|string',
            'timezone'                  =>          'required',
            'event_start_date'          =>          'before:event_end_date|required',
            'event_end_date'            =>          'after:event_start_date|required',
            'transacted_currency'       =>          'required',
            'display_currency'          =>          'required',
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
            'start_date.before'     => 'Start Date must be smaller than End Date',
            'end_date.after'        => 'End Date must be smaller than Start Date.',
            'latitude.required'     => 'Please select location from Search Results',
        ];
    }
}
