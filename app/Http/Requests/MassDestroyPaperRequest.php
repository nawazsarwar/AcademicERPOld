<?php

namespace App\Http\Requests;

use App\Models\Paper;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPaperRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:papers,id',
        ];
    }
}
