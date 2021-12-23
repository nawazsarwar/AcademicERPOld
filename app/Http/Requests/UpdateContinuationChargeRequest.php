<?php

namespace App\Http\Requests;

use App\Models\ContinuationCharge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContinuationChargeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('continuation_charge_edit');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
