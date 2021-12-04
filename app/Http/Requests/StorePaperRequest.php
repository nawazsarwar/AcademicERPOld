<?php

namespace App\Http\Requests;

use App\Models\Paper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paper_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:papers',
            ],
            'name' => [
                'string',
                'required',
                'unique:papers',
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
            'paper_type_id' => [
                'required',
                'integer',
            ],
            'part' => [
                'string',
                'nullable',
            ],
            'credits' => [
                'string',
                'nullable',
            ],
        ];
    }
}
