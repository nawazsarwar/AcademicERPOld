<?php

namespace App\Http\Requests;

use App\Models\CourseAcademicSession;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseAcademicSessionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_academic_session_create');
    }

    public function rules()
    {
        return [
            'academic_session_id' => [
                'required',
                'integer',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
