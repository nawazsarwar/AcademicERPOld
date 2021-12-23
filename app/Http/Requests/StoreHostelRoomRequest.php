<?php

namespace App\Http\Requests;

use App\Models\HostelRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHostelRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hostel_room_create');
    }

    public function rules()
    {
        return [
            'hostel_id' => [
                'required',
                'integer',
            ],
            'number' => [
                'string',
                'required',
            ],
            'vacancy' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
