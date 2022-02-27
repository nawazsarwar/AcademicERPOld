<?php

namespace App\Http\Requests;

use App\Models\Website;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWebsiteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('website_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'domain' => [
                'string',
                'nullable',
            ],
        ];
    }
}
