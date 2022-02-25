<?php

namespace App\Http\Requests;

use App\Models\SalaryData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalaryDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_data_edit');
    }

    public function rules()
    {
        return [
            'ecode' => [
                'string',
                'min:5',
                'max:10',
                'required',
            ],
            'emp_name' => [
                'string',
                'required',
            ],
            'first_name' => [
                'string',
                'nullable',
            ],
            'middle_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'pay_grade' => [
                'string',
                'nullable',
            ],
            'pan_no' => [
                'string',
                'nullable',
            ],
            'desig_name' => [
                'string',
                'nullable',
            ],
            'dept_name' => [
                'string',
                'nullable',
            ],
            'emp_status' => [
                'string',
                'nullable',
            ],
            'date_of_join' => [
                'string',
                'nullable',
            ],
            'sex' => [
                'string',
                'nullable',
            ],
            'date_of_birth' => [
                'string',
                'nullable',
            ],
            'retire_date' => [
                'string',
                'nullable',
            ],
            'pf_type' => [
                'string',
                'nullable',
            ],
            'emp_grop' => [
                'string',
                'nullable',
            ],
            'leave' => [
                'string',
                'nullable',
            ],
            'designation_category' => [
                'string',
                'nullable',
            ],
            'exists_cc' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'import_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'salary_month' => [
                'string',
                'nullable',
            ],
        ];
    }
}
