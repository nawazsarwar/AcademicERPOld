<?php

namespace App\Http\Requests;

use App\Models\ProgrammeDeliveryMode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProgrammeDeliveryModeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('programme_delivery_mode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:programme_delivery_modes,id',
        ];
    }
}
