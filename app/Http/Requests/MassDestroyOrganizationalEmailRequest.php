<?php

namespace App\Http\Requests;

use App\Models\OrganizationalEmail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOrganizationalEmailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('organizational_email_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:organizational_emails,id',
        ];
    }
}
