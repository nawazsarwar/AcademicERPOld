<?php

namespace App\Http\Requests;

use App\Models\Campus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCampusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('campus_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:campuses,name,' . request()->route('campus')->id,
            ],
            'code' => [
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
