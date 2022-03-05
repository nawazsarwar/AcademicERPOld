<?php

namespace App\Http\Requests;

use App\Models\AcademicQualification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAcademicQualificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('academic_qualification_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'qualification_level_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'year' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'roll_no' => [
                'string',
                'nullable',
            ],
            'board_id' => [
                'required',
                'integer',
            ],
            'result' => [
                'required',
            ],
            'grading_type' => [
                'required',
            ],
            'grade' => [
                'string',
                'nullable',
            ],
            'cdn_url' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
