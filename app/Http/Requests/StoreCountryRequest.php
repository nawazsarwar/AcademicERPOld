<?php

namespace App\Http\Requests;

use App\Models\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCountryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('country_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:190',
                'required',
                'unique:countries',
            ],
            'code' => [
                'string',
                'max:190',
                'required',
                'unique:countries',
            ],
            'dialing_code' => [
                'string',
                'max:190',
                'required',
                'unique:countries',
            ],
            'nationality' => [
                'string',
                'max:190',
                'nullable',
            ],
            'sequence' => [
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
