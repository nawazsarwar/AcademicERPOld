<?php

namespace App\Http\Requests;

use App\Models\VerificationStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVerificationStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('verification_status_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:verification_statuses,name,' . request()->route('verification_status')->id,
            ],
        ];
    }
}
