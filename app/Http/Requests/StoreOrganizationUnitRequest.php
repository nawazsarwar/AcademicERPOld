<?php

namespace App\Http\Requests;

use App\Models\OrganizationUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrganizationUnitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('organization_unit_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'code' => [
                'string',
                'nullable',
            ],
            'title_hindi' => [
                'string',
                'nullable',
            ],
            'title_urdu' => [
                'string',
                'nullable',
            ],
            'category' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
