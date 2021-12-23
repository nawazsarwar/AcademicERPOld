<?php

namespace App\Http\Requests;

use App\Models\Hall;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHallRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hall_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'gender' => [
                'required',
            ],
            'campus_id' => [
                'required',
                'integer',
            ],
            'color' => [
                'string',
                'required',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
