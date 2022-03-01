<?php

namespace App\Http\Requests;

use App\Models\ClientsMerchant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientsMerchantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clients_merchant_create');
    }

    public function rules()
    {
        return [
            'client_id' => [
                'required',
                'integer',
            ],
            'merchant_id' => [
                'required',
                'integer',
            ],
            'key' => [
                'string',
                'required',
            ],
            'secret' => [
                'string',
                'required',
            ],
            'head' => [
                'string',
                'required',
            ],
            'sub_head' => [
                'string',
                'nullable',
            ],
        ];
    }
}
