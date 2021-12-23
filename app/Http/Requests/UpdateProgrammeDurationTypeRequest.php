<?php

namespace App\Http\Requests;

use App\Models\ProgrammeDurationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProgrammeDurationTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('programme_duration_type_edit');
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
