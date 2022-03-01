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
            'season' => [
                'string',
                'nullable',
            ],
            'paper_id' => [
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
            'entered_by_id' => [
                'required',
                'integer',
            ],
            'entered_at' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'verified_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'result_declaration_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
