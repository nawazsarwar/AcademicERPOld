<?php

namespace App\Http\Requests;

use App\Models\ReevaluationPaper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReevaluationPaperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reevaluation_paper_edit');
    }

    public function rules()
    {
        return [
            'reevaluation_id' => [
                'required',
                'integer',
            ],
            'examination_mark_id' => [
                'required',
                'integer',
            ],
            'paper_id' => [
                'required',
                'integer',
            ],
            'paper_code' => [
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
