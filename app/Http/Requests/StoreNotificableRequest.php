<?php

namespace App\Http\Requests;

use App\Models\Notificable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNotificableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notificable_create');
    }

    public function rules()
    {
        return [
            'notification_id' => [
                'required',
                'integer',
            ],
            'notificable' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'notificable_type' => [
                'string',
                'required',
            ],
        ];
    }
}
