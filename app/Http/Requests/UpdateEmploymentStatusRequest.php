<?php

namespace App\Http\Requests;

use App\Models\EmploymentStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEmploymentStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employment_status_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
