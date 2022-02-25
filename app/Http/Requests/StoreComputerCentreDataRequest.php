<?php

namespace App\Http\Requests;

use App\Models\ComputerCentreData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreComputerCentreDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('computer_centre_data_create');
    }

    public function rules()
    {
        return [
            'uri' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'parser' => [
                'string',
                'nullable',
            ],
            'parent' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'crawled' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'last_crawled_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
