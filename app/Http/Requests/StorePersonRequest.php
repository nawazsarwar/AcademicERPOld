<?php

namespace App\Http\Requests;

use App\Models\Person;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePersonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('person_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'first_name' => [
                'string',
                'required',
            ],
            'middle_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'fathers_first_name' => [
                'string',
                'required',
            ],
            'fathers_middle_name' => [
                'string',
                'nullable',
            ],
            'fathers_last_name' => [
                'string',
                'nullable',
            ],
            'mothers_first_name' => [
                'string',
                'required',
            ],
            'mothers_middle_name' => [
                'string',
                'nullable',
            ],
            'mothers_last_name' => [
                'string',
                'nullable',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'blood_group_id' => [
                'required',
                'integer',
            ],
            'aadhaar_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sub_caste' => [
                'string',
                'nullable',
            ],
            'identity_marks' => [
                'string',
                'nullable',
            ],
            'dob_proof' => [
                'string',
                'nullable',
            ],
            'spouse_name' => [
                'string',
                'nullable',
            ],
            'pan_no' => [
                'string',
                'min:10',
                'max:10',
                'nullable',
            ],
            'passport_no' => [
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
