<?php

namespace App\Http\Requests;

use App\Models\ContinuationCharge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContinuationChargeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('continuation_charge_create');
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
