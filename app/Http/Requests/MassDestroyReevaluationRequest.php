<?php

namespace App\Http\Requests;

use App\Models\Reevaluation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReevaluationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reevaluation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reevaluations,id',
        ];
    }
}
