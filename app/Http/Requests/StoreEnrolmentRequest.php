<?php

namespace App\Http\Requests;

use App\Models\Enrolment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEnrolmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('enrolment_create');
    }

    public function rules()
    {
        return [
            'number' => [
                'string',
                'required',
                'unique:enrolments',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'remarks' => [
                'string',
                'nullable',
            ],
        ];
    }
}
