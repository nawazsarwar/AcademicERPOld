<?php

namespace App\Http\Requests;

use App\Models\Nominee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNomineeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nominee_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'relationship_employee' => [
                'string',
                'nullable',
            ],
            'age' => [
                'string',
                'nullable',
            ],
            'witness_name_1' => [
                'string',
                'nullable',
            ],
            'designation_witness_1' => [
                'string',
                'nullable',
            ],
            'department_witness_1' => [
                'string',
                'nullable',
            ],
            'witness_name_2' => [
                'string',
                'nullable',
            ],
            'designation_witness_2' => [
                'string',
                'nullable',
            ],
            'department_witness_2' => [
                'string',
                'nullable',
            ],
            'employee_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'remarks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
