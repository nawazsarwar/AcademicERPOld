<?php

namespace App\Http\Requests;

use App\Models\Hostel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHostelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hostel_create');
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
                'unique:hostels',
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
            'remarks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
