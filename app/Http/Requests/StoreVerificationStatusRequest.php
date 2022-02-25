<?php

namespace App\Http\Requests;

use App\Models\VerificationStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVerificationStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('verification_status_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:verification_statuses',
            ],
        ];
    }
}
