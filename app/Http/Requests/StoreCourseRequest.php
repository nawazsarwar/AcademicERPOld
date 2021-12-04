<?php

namespace App\Http\Requests;

use App\Models\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_create');
    }

    public function rules()
    {
        return [
            'campus_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'code' => [
                'string',
                'required',
            ],
            'course_code' => [
                'string',
                'nullable',
            ],
            'internal_code' => [
                'string',
                'nullable',
            ],
            'mode' => [
                'string',
                'nullable',
            ],
            'course_type' => [
                'string',
                'nullable',
            ],
            'test_type' => [
                'string',
                'nullable',
            ],
            'duration' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'duration_type' => [
                'string',
                'nullable',
            ],
            'total_intake' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
