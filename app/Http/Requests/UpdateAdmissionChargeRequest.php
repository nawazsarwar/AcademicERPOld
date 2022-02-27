<?php

namespace App\Http\Requests;

use App\Models\AdmissionCharge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdmissionChargeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('admission_charge_edit');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'code' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
