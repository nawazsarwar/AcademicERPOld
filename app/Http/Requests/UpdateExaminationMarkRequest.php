<?php

namespace App\Http\Requests;

use App\Models\ExaminationMark;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExaminationMarkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('examination_mark_edit');
    }

    public function rules()
    {
        return [
            'student_id' => [
                'required',
                'integer',
            ],
            'academic_session_id' => [
                'required',
                'integer',
            ],
            'sessional' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'theory' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'grade' => [
                'string',
                'nullable',
            ],
            'grade_point' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'result' => [
                'string',
                'nullable',
            ],
            'part' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'final_result' => [
                'string',
                'nullable',
            ],
        ];
    }
}
