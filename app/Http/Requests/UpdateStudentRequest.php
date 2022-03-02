<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_edit');
    }

    public function rules()
    {
        return [
            'person_id' => [
                'required',
                'integer',
            ],
            'enrolment_id' => [
                'required',
                'integer',
            ],
            'enrolment_no' => [
                'string',
                'required',
                'unique:students,enrolment_no,' . request()->route('student')->id,
            ],
            'mobile_no' => [
                'string',
                'nullable',
            ],
            'guardians_mobile_no' => [
                'string',
                'nullable',
            ],
            'emergency_mobile_no' => [
                'string',
                'nullable',
            ],
            'verified_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'detained' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
