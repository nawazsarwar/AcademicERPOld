<?php

namespace App\Http\Requests;

use App\Models\ContentPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContentPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_page_create');
    }

    public function rules()
    {
        return [
            'website_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'required',
                'unique:content_pages',
            ],
            'type' => [
                'required',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
            'status' => [
                'string',
                'nullable',
            ],
            'approved' => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'publish_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
