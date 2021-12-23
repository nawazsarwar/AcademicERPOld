<?php

namespace App\Http\Requests;

use App\Models\PapersRegistration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePapersRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('papers_registration_create');
    }

    public function rules()
    {
        return [
            'paper_id' => [
                'required',
                'integer',
            ],
            'registration_id' => [
                'required',
                'integer',
            ],
            'student_id' => [
                'required',
                'integer',
            ],
            'registration_mode' => [
                'required',
            ],
            'faculty' => [
                'string',
                'max:190',
                'nullable',
            ],
            'department' => [
                'string',
                'max:190',
                'nullable',
            ],
            'department_code' => [
                'string',
                'max:20',
                'nullable',
            ],
            'paper_code' => [
                'string',
                'max:20',
                'nullable',
            ],
            'paper_title' => [
                'string',
                'max:190',
                'nullable',
            ],
            'fraction' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'credits' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'string',
                'max:190',
                'nullable',
            ],
        ];
    }
}
