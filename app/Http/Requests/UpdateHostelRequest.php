<?php

namespace App\Http\Requests;

use App\Models\Hostel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHostelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hostel_edit');
    }

    public function rules()
    {
        return [
            'hall_id' => [
                'required',
                'integer',
            ],
            'code' => [
                'string',
                'required',
                'unique:hostels,code,' . request()->route('hostel')->id,
            ],
            'name' => [
                'string',
                'required',
            ],
            'residential_status' => [
                'nullable',
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
