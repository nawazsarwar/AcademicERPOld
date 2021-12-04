<?php

namespace App\Http\Requests;

use App\Models\Pincode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePincodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pincode_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'locality' => [
                'string',
                'nullable',
            ],
            'pincode' => [
                'string',
                'required',
                'unique:pincodes',
            ],
            'sub_district' => [
                'string',
                'nullable',
            ],
            'district' => [
                'string',
                'required',
            ],
        ];
    }
}
