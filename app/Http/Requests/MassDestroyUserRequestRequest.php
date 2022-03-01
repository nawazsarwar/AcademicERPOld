<?php

namespace App\Http\Requests;

use App\Models\UserRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUserRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:user_requests,id',
        ];
    }
}
