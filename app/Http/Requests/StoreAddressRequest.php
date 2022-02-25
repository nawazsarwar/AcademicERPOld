<?php

namespace App\Http\Requests;

use App\Models\Address;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('address_create');
    }

    public function rules()
    {
        return [
            'person_id' => [
                'required',
                'integer',
            ],
            'country_id' => [
                'required',
                'integer',
            ],
            'mobile' => [
                'string',
                'required',
            ],
            'postal_code_id' => [
                'required',
                'integer',
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
            'type' => [
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
