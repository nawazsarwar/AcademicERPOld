<?php

namespace App\Http\Requests;

use App\Models\AdmissionEntranceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAdmissionEntranceTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('admission_entrance_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:admission_entrance_types,id',
        ];
    }
}
