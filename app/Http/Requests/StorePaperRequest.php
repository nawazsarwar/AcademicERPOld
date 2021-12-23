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
            'title' => [
                'string',
                'max:190',
                'required',
            ],
            'paper_type_id' => [
                'required',
                'integer',
            ],
            'fraction' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'credits' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'administrable_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
