<?php

namespace App\Http\Requests;

use App\Models\OrganizationUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOrganizationUnitRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('organization_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:organization_units,id',
        ];
    }
}
