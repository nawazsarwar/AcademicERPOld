<?php

namespace App\Http\Requests;

use App\Models\StudentAdmission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentAdmissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_admission_edit');
    }

    public function rules()
    {
        return [
            'roll_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'application_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
            'enrolment_id' => [
                'required',
                'integer',
            ],
            'faculty_no' => [
                'string',
                'required',
            ],
        ];
    }
}
