<?php

namespace App\Http\Requests;

use App\Models\ProgrammeDurationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProgrammeDurationTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('programme_duration_type_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'max:190',
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
