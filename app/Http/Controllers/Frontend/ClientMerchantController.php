<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientMerchantRequest;
use App\Http\Requests\StoreClientMerchantRequest;
use App\Http\Requests\UpdateClientMerchantRequest;
use App\Models\Client;
use App\Models\ClientMerchant;
use App\Models\Merchant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMerchantController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_merchant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMerchants = ClientMerchant::with(['client', 'merchant'])->get();

        return view('frontend.clientMerchants.index', compact('clientMerchants'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_merchant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = Merchant::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.clientMerchants.create', compact('clients', 'merchants'));
    }

    public function store(StoreClientMerchantRequest $request)
    {
        $clientMerchant = ClientMerchant::create($request->all());

        return redirect()->route('frontend.client-merchants.index');
    }

    public function edit(ClientMerchant $clientMerchant)
    {
        abort_if(Gate::denies('client_merchant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = Merchant::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientMerchant->load('client', 'merchant');

        return view('frontend.clientMerchants.edit', compact('clientMerchant', 'clients', 'merchants'));
    }

    public function update(UpdateClientMerchantRequest $request, ClientMerchant $clientMerchant)
    {
        $clientMerchant->update($request->all());

        return redirect()->route('frontend.client-merchants.index');
    }

    public function show(ClientMerchant $clientMerchant)
    {
        abort_if(Gate::denies('client_merchant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMerchant->load('client', 'merchant');

        return view('frontend.clientMerchants.show', compact('clientMerchant'));
    }

    public function destroy(ClientMerchant $clientMerchant)
    {
        abort_if(Gate::denies('client_merchant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientMerchant->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientMerchantRequest $request)
    {
        ClientMerchant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
