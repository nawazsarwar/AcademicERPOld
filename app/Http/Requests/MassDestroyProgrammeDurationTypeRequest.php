<?php

namespace App\Http\Requests;

use App\Models\ProgrammeDurationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProgrammeDurationTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('programme_duration_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:programme_duration_types,id',
        ];
    }
}
