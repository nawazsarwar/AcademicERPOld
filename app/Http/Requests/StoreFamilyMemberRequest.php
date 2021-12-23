<?php

namespace App\Http\Requests;

use App\Models\FamilyMember;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFamilyMemberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('family_member_create');
    }

    public function rules()
    {
        return [
            'employee_id' => [
                'required',
                'integer',
            ],
            'submission_date' => [
                'string',
                'nullable',
            ],
            'family_member_name' => [
                'string',
                'required',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'relationship' => [
                'string',
                'required',
            ],
            'marital_status' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
