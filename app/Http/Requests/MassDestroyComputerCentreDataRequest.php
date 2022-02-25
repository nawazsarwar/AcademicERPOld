<?php

namespace App\Http\Requests;

use App\Models\ComputerCentreData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyComputerCentreDataRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('computer_centre_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:computer_centre_datas,id',
        ];
    }
}
