<?php

namespace App\Http\Requests;

use App\Models\Designation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDesignationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('designation_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:designations,code,' . request()->route('designation')->id,
            ],
            'name' => [
                'string',
                'required',
            ],
            'pay_grade' => [
                'string',
                'nullable',
            ],
            'type_id' => [
                'required',
                'integer',
            ],
            'retirement_age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
