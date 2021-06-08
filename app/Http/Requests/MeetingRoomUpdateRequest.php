<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRoomUpdateRequest extends FormRequest
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
            'meeting_room_type_id' => [
                'required',
                'exists:meeting_room_types,id',
            ],
            'name' => ['required', 'max:190', 'string'],
            'profile_image' => ['required', 'max:190', 'string'],
            'link' => ['nullable', 'max:190', 'string'],
        ];
    }
}
