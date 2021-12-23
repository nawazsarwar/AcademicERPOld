<?php

namespace App\Http\Requests;

use App\Models\ProgrammeDeliveryMode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProgrammeDeliveryModeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('programme_delivery_mode_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'max:50',
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
