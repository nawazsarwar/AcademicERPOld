<?php

namespace App\Http\Requests;

use App\Models\Degree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDegreeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('degree_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:degrees,name,' . request()->route('degree')->id,
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
