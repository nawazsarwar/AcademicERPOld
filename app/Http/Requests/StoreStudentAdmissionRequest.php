<?php

namespace App\Http\Requests;

use App\Models\StudentAdmission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentAdmissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_admission_create');
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
            'session_id' => [
                'required',
                'integer',
            ],
            'admission_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
