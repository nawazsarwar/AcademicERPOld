<?php

namespace App\Http\Requests;

use App\Models\OrganizationalEmail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrganizationalEmailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organizational_email_edit');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'unique:organizational_emails,email,' . request()->route('organizational_email')->id,
            ],
            'type' => [
                'required',
            ],
            'first_password' => [
                'string',
                'nullable',
            ],
            'avatar_url' => [
                'string',
                'nullable',
            ],
            'recovery_phone' => [
                'string',
                'nullable',
            ],
            'gender' => [
                'string',
                'nullable',
            ],
            'office_365' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'office_365_uid' => [
                'string',
                'nullable',
            ],
            'office_365_object_uid' => [
                'string',
                'nullable',
            ],
            'office_365_deployed_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'gsuite' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gsuite_uid' => [
                'string',
                'nullable',
            ],
            'gsuite_deployed_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
