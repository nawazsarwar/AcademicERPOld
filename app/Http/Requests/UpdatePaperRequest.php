<?php

namespace App\Http\Requests;

use App\Models\Paper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paper_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:papers,code,' . request()->route('paper')->id,
            ],
            'name' => [
                'string',
                'required',
                'unique:papers,name,' . request()->route('paper')->id,
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
