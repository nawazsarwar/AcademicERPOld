<?php

namespace App\Http\Requests;

use App\Models\AnswerScript;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAnswerScriptRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('answer_script_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:answer_scripts,id',
        ];
    }
}
