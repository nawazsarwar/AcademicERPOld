<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_edit');
    }

    public function rules()
    {
        return [
            'country_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'required',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
            'details' => [
                'string',
                'max:150',
                'required',
            ],
            'street' => [
                'string',
                'nullable',
            ],
            'landmark' => [
                'string',
                'nullable',
            ],
            'locality' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
