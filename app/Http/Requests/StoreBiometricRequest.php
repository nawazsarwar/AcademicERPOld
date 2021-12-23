<?php

namespace App\Http\Requests;

use App\Models\Biometric;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBiometricRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('biometric_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'required',
            ],
            'name' => [
                'required',
            ],
            'path' => [
                'string',
                'nullable',
            ],
            'cdn_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
