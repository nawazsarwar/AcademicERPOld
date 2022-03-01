<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMerchantRequest;
use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;
use App\Models\Merchant;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MerchantsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('merchant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = Merchant::all();

        return view('frontend.merchants.index', compact('merchants'));
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchants.create');
    }

    public function store(StoreMerchantRequest $request)
    {
        $merchant = Merchant::create($request->all());

        return redirect()->route('frontend.merchants.index');
    }

    public function edit(Merchant $merchant)
    {
        abort_if(Gate::denies('merchant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchants.edit', compact('merchant'));
    }

    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        $merchant->update($request->all());

        return redirect()->route('frontend.merchants.index');
    }

    public function show(Merchant $merchant)
    {
        abort_if(Gate::denies('merchant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchants.show', compact('merchant'));
    }

    public function destroy(Merchant $merchant)
    {
        abort_if(Gate::denies('merchant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchant->delete();

        return back();
    }

    public function massDestroy(MassDestroyMerchantRequest $request)
    {
        Merchant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
