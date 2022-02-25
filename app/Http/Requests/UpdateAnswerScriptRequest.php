<?php

namespace App\Http\Requests;

use App\Models\AnswerScript;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnswerScriptRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('answer_script_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'paper_id' => [
                'required',
                'integer',
            ],
            'page_no' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'file_path' => [
                'string',
                'required',
            ],
            'extension' => [
                'string',
                'required',
            ],
            'file_url' => [
                'string',
                'nullable',
            ],
            'cdn_url' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
