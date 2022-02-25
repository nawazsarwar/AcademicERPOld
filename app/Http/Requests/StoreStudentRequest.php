<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_create');
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
            'guardian_mobile_no' => [
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
