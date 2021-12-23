<?php

namespace App\Http\Requests;

use App\Models\AdmissionEntranceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdmissionEntranceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('admission_entrance_type_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'max:50',
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
