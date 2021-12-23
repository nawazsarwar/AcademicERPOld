<?php

namespace App\Http\Requests;

use App\Models\CourseLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCourseLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_level_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
