<?php

namespace App\Http\Requests;

use App\Models\Advertisement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAdvertisementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('advertisement_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
            'dated' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'type' => [
                'required',
            ],
            'advertisement_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
