<?php

namespace App\Http\Requests;

use App\Models\WorkExperience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWorkExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('work_experience_edit');
    }

    public function rules()
    {
        return [
            'employer' => [
                'string',
                'max:190',
                'required',
            ],
            'employer_type' => [
                'required',
            ],
            'designation' => [
                'string',
                'max:190',
                'required',
            ],
            'employed_from' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'employed_to' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'responsibilities' => [
                'string',
                'max:190',
                'required',
            ],
            'reason_for_leaving' => [
                'string',
                'nullable',
            ],
            'pay_band' => [
                'string',
                'max:190',
                'nullable',
            ],
            'basic_pay' => [
                'string',
                'max:190',
                'nullable',
            ],
            'gross_pay' => [
                'string',
                'max:190',
                'nullable',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
