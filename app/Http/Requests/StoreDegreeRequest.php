<?php

namespace App\Http\Requests;

use App\Models\Degree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDegreeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('degree_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:degrees',
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'remarks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
