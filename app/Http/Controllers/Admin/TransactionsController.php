<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Client;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\Service;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::with(['order', 'service', 'client', 'merchant'])->get();

        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('parameters', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = Merchant::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transactions.create', compact('clients', 'merchants', 'orders', 'services'));
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('parameters', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Service::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = Merchant::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction->load('order', 'service', 'client', 'merchant');

        return view('admin.transactions.edit', compact('clients', 'merchants', 'orders', 'services', 'transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index');
    }

    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('order', 'service', 'client', 'merchant');

        return view('admin.transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
