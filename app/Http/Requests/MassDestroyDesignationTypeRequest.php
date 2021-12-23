<?php

namespace App\Http\Requests;

use App\Models\DesignationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDesignationTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('designation_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:designation_types,id',
        ];
    }
}
