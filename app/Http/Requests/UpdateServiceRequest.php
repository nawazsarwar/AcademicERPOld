<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_edit');
    }

    public function rules()
    {
        return [
            'uid' => [
                'string',
                'required',
                'unique:services,uid,' . request()->route('service')->id,
            ],
            'name' => [
                'string',
                'required',
            ],
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
