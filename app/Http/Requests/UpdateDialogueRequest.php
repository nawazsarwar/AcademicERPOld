<?php

namespace App\Http\Requests;

use App\Models\Dialogue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDialogueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dialogue_edit');
    }

    public function rules()
    {
        return [
            'merchant_id' => [
                'required',
                'integer',
            ],
            'pingback_url' => [
                'string',
                'nullable',
            ],
            'request_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
