<?php

namespace App\Http\Requests;

use App\Models\VerificationStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVerificationStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('verification_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:verification_statuses,id',
        ];
    }
}
