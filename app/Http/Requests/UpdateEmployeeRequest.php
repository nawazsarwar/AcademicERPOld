<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_edit');
    }

    public function rules()
    {
        return [
            'person_id' => [
                'required',
                'integer',
            ],
            'employee_no' => [
                'string',
                'required',
                'unique:employees,employee_no,' . request()->route('employee')->id,
            ],
            'service_book_no' => [
                'string',
                'nullable',
            ],
            'application_no' => [
                'string',
                'nullable',
            ],
            'highest_qualification' => [
                'string',
                'nullable',
            ],
            'status_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'leave_account_no' => [
                'string',
                'nullable',
            ],
            'pf_account_no' => [
                'string',
                'nullable',
            ],
            'personal_file_no' => [
                'string',
                'nullable',
            ],
            'verified_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
