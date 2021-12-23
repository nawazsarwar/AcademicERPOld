<?php

namespace App\Http\Requests;

use App\Models\AdmissionCharge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAdmissionChargeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('admission_charge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:admission_charges,id',
        ];
    }
}
