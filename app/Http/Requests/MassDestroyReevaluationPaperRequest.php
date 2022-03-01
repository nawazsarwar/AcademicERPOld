<?php

namespace App\Http\Requests;

use App\Models\ReevaluationPaper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReevaluationPaperRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reevaluation_paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reevaluation_papers,id',
        ];
    }
}
