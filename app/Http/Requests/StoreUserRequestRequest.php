<?php

namespace App\Http\Requests;

use App\Models\UserRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_request_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'ip' => [
                'string',
                'nullable',
            ],
            'url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
