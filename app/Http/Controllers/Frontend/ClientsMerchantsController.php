<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientsMerchantRequest;
use App\Http\Requests\StoreClientsMerchantRequest;
use App\Http\Requests\UpdateClientsMerchantRequest;
use App\Models\Client;
use App\Models\ClientsMerchant;
use App\Models\Merchant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientsMerchantsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('clients_merchant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientsMerchants = ClientsMerchant::with(['client', 'merchant'])->get();

        return view('frontend.clientsMerchants.index', compact('clientsMerchants'));
    }

    public function create()
    {
        abort_if(Gate::denies('clients_merchant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = Merchant::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.clientsMerchants.create', compact('clients', 'merchants'));
    }

    public function store(StoreClientsMerchantRequest $request)
    {
        $clientsMerchant = ClientsMerchant::create($request->all());

        return redirect()->route('frontend.clients-merchants.index');
    }

    public function edit(ClientsMerchant $clientsMerchant)
    {
        abort_if(Gate::denies('clients_merchant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = Merchant::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientsMerchant->load('client', 'merchant');

        return view('frontend.clientsMerchants.edit', compact('clients', 'clientsMerchant', 'merchants'));
    }

    public function update(UpdateClientsMerchantRequest $request, ClientsMerchant $clientsMerchant)
    {
        $clientsMerchant->update($request->all());

        return redirect()->route('frontend.clients-merchants.index');
    }

    public function show(ClientsMerchant $clientsMerchant)
    {
        abort_if(Gate::denies('clients_merchant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientsMerchant->load('client', 'merchant');

        return view('frontend.clientsMerchants.show', compact('clientsMerchant'));
    }

    public function destroy(ClientsMerchant $clientsMerchant)
    {
        abort_if(Gate::denies('clients_merchant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientsMerchant->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientsMerchantRequest $request)
    {
        ClientsMerchant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
