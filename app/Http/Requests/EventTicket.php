<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventTicket extends FormRequest
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
            'event_id'                  =>          'required|string',
            'type'                      =>          'required|in:Paid,Donation,Free',
            'name'                      =>          'required|string',
            'price'                     =>          'required|integer',
            'quantity'                  =>          'required|integer',
            'description'               =>          'required|string',
            'selling_start'             =>          'date_format:Y-m-d H:i:s',
            'selling_end'               =>          'date_format:Y-m-d H:i:s',
            'request_type'              =>          'required|in:store,edit'
        ];
    }
}
