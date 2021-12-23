<?php

namespace App\Http\Requests;

use App\Models\Enrolment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEnrolmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('enrolment_edit');
    }

    public function rules()
    {
        return [
            'number' => [
                'string',
                'required',
                'unique:enrolments,number,' . request()->route('enrolment')->id,
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
