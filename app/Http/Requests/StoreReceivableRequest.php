<?php

namespace App\Http\Requests;

use App\Models\Receivable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReceivableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('receivable_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'narration' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'required',
            ],
            'raised_on' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'settlement_status' => [
                'string',
                'nullable',
            ],
            'settled_on' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
