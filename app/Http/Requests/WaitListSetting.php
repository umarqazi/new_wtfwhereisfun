<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WaitListSetting extends FormRequest
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
//            'waitlist_check'            => 'required',
//            'event_time_locations_id'   => 'required',
            'triggers_on'               => 'required',
            'max_count'                 => 'required',
            'collect_name'              => 'required',
            'collect_email'             => 'required',
            'time_to_respond_days'      => 'required',
            'time_to_respond_hours'     => 'required|max:23',
            'time_to_respond_mins'      => 'required|max:59',
            'auto_respond_msgs'         => 'required',
            'ticket_release_msgs'       => 'required'
        ];
    }
}
