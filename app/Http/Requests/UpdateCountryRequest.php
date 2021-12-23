<?php

namespace App\Http\Requests;

use App\Models\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCountryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('country_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:190',
                'required',
                'unique:countries,name,' . request()->route('country')->id,
            ],
            'code' => [
                'string',
                'max:190',
                'required',
                'unique:countries,code,' . request()->route('country')->id,
            ],
            'phone_code' => [
                'string',
                'max:190',
                'nullable',
            ],
            'nationality' => [
                'string',
                'max:190',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
