<?php

namespace App\Http\Requests;

use App\Models\Examiner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExaminerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('examiner_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'institute' => [
                'string',
                'required',
            ],
            'department' => [
                'string',
                'nullable',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
            ],
            'paper_id' => [
                'required',
                'integer',
            ],
            'otp' => [
                'string',
                'nullable',
            ],
            'otp_validity' => [
                'string',
                'nullable',
            ],
            'otp_verified' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'start' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'end' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
