<?php

namespace App\Http\Requests;

use App\Models\Reevaluation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReevaluationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reevaluation_edit');
    }

    public function rules()
    {
        return [
            'exam_registration_id' => [
                'required',
                'integer',
            ],
            'student_id' => [
                'required',
                'integer',
            ],
            'course_id' => [
                'required',
                'integer',
            ],
            'examination_name' => [
                'string',
                'nullable',
            ],
            'examination_year' => [
                'string',
                'nullable',
            ],
            'examination_part' => [
                'string',
                'nullable',
            ],
            'result_declaration_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'submitted' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
