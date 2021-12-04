<?php

namespace App\Http\Requests;

use App\Models\Campus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCampusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('campus_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:campuses',
            ],
            'code' => [
                'string',
                'required',
            ],
            'remarks' => [
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
