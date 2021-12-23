<?php

namespace App\Http\Requests;

use App\Models\RegistrationForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRegistrationFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('registration_form_edit');
    }

    public function rules()
    {
        return [
            'course_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'max:190',
                'required',
            ],
            'opening_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'closing_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'academic_session_id' => [
                'required',
                'integer',
            ],
            'programme_duration_type_id' => [
                'required',
                'integer',
            ],
            'fillable_current' => [
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
