<?php

namespace App\Http\Requests;

use App\Models\CoursePaper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCoursePaperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_paper_edit');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'paper_id' => [
                'required',
                'integer',
            ],
            'fraction' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'academic_session_id' => [
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
