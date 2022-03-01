<?php

namespace App\Http\Requests;

use App\Models\ClientsMerchant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientsMerchantRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('clients_merchant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:clients_merchants,id',
        ];
    }
}
