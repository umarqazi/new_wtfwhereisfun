<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventTicketPass extends FormRequest
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
            'pass_name'                  =>          'required|string',
            'request_type'               =>          'required|in:store,edit',
            'ticket_id'                  =>          'required|integer'
        ];
    }
}
