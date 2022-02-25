<?php

namespace App\Http\Requests;

use App\Models\CourseUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_user_edit');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'faculty_no' => [
                'string',
                'required',
            ],
            'admitted_in_id' => [
                'required',
                'integer',
            ],
            'admitted_on' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'duration_extension' => [
                'string',
                'nullable',
            ],
            'verified_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
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
