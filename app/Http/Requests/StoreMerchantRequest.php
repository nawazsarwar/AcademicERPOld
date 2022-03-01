<?php

namespace App\Http\Requests;

use App\Models\Merchant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMerchantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('merchant_create');
    }

    public function rules()
    {
        return [
            'uid' => [
                'string',
                'required',
            ],
            'mode' => [
                'required',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'parameters' => [
                'required',
            ],
            'account' => [
                'string',
                'required',
            ],
        ];
    }
}
