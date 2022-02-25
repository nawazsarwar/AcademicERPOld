<?php

namespace App\Http\Requests;

use App\Models\Phone;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePhoneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('phone_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'dialing_code_id' => [
                'required',
                'integer',
            ],
            'number' => [
                'string',
                'required',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'remarks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
