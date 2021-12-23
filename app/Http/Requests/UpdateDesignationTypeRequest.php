<?php

namespace App\Http\Requests;

use App\Models\DesignationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDesignationTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('designation_type_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'max:190',
                'required',
            ],
        ];
    }
}
