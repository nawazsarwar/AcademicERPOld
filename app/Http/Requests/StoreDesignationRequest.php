<?php

namespace App\Http\Requests;

use App\Models\Designation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDesignationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('designation_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:designations',
            ],
            'name' => [
                'string',
                'required',
            ],
            'pay_grade' => [
                'string',
                'nullable',
            ],
        ];
    }
}
