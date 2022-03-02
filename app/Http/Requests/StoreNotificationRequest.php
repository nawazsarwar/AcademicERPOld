<?php

namespace App\Http\Requests;

use App\Models\Notification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notification_create');
    }

    public function rules()
    {
        return [
            'mode' => [
                'string',
                'required',
            ],
            'type' => [
                'string',
                'required',
            ],
            'status' => [
                'string',
                'required',
            ],
            'json' => [
                'required',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
            'try_count' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'done' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
