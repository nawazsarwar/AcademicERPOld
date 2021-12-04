<?php

namespace App\Http\Requests;

use App\Models\Degree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDegreeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('degree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:degrees,id',
        ];
    }
}
