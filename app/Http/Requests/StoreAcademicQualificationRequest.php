<?php

namespace App\Http\Requests;

use App\Models\AcademicQualification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAcademicQualificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('academic_qualification_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'qualification_level_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'year' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'roll_no' => [
                'string',
                'nullable',
            ],
            'board_id' => [
                'required',
                'integer',
            ],
            'result' => [
                'string',
                'required',
            ],
            'percentage' => [
                'string',
                'nullable',
            ],
            'cdn_url' => [
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
