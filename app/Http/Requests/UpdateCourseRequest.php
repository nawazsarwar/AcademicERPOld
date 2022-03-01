<?php

namespace App\Http\Requests;

use App\Models\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_edit');
    }

    public function rules()
    {
        return [
            'degree_id' => [
                'required',
                'integer',
            ],
            'campus_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'title_hindi' => [
                'string',
                'max:190',
                'nullable',
            ],
            'title_urdu' => [
                'string',
                'max:190',
                'nullable',
            ],
            'code' => [
                'string',
                'required',
                'unique:courses,code,' . request()->route('course')->id,
            ],
            'course_code' => [
                'string',
                'nullable',
            ],
            'internal_code' => [
                'string',
                'nullable',
            ],
            'entrance_type_id' => [
                'required',
                'integer',
            ],
            'mode_id' => [
                'required',
                'integer',
            ],
            'duration_type_id' => [
                'required',
                'integer',
            ],
            'duration' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_intake' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'subsidiarizable' => [
                'required',
            ],
            'creditizable' => [
                'required',
            ],
            'administrable_id' => [
                'required',
                'integer',
            ],
            'administrable_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
