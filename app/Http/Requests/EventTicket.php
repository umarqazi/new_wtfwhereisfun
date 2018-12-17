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
        if($this->request_type != 'store'){
            $nameRule = 'required|string|unique:event_tickets,name,'.$this->ticket_id;
        }else{
            $nameRule = 'required|string|unique:event_tickets,name';
        }
        return [
            'event_id'                  =>          'required|string',
            'type'                      =>          'required|in:Paid,Donation,Free',
            'price'                     =>          'required|integer|min:1',
            'quantity'                  =>          'required|integer|min:1',
            'selling_start'             =>          'before:selling_end|nullable',
            'selling_end'               =>          'after:selling_start|nullable',
            'request_type'              =>          'required|in:store,edit',
            'min_order'                 =>          'integer|nullable',
            'max_order'                 =>          'integer|nullable',
            'time_location_id'          =>          'required',
            'name'                      =>          $nameRule,
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
            'time_location_id.required' => 'Please select one Time and Location',
        ];
    }
}
