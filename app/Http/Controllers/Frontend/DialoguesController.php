<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDialogueRequest;
use App\Http\Requests\StoreDialogueRequest;
use App\Http\Requests\UpdateDialogueRequest;
use App\Models\Dialogue;
use App\Models\Merchant;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DialoguesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dialogue_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dialogues = Dialogue::with(['merchant', 'transaction'])->get();

        return view('frontend.dialogues.index', compact('dialogues'));
    }

    public function create()
    {
        abort_if(Gate::denies('dialogue_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = Merchant::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.dialogues.create', compact('merchants', 'transactions'));
    }

    public function store(StoreDialogueRequest $request)
    {
        $dialogue = Dialogue::create($request->all());

        return redirect()->route('frontend.dialogues.index');
    }

    public function edit(Dialogue $dialogue)
    {
        abort_if(Gate::denies('dialogue_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = Merchant::pluck('uid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dialogue->load('merchant', 'transaction');

        return view('frontend.dialogues.edit', compact('dialogue', 'merchants', 'transactions'));
    }

    public function update(UpdateDialogueRequest $request, Dialogue $dialogue)
    {
        $dialogue->update($request->all());

        return redirect()->route('frontend.dialogues.index');
    }

    public function show(Dialogue $dialogue)
    {
        abort_if(Gate::denies('dialogue_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dialogue->load('merchant', 'transaction');

        return view('frontend.dialogues.show', compact('dialogue'));
    }

    public function destroy(Dialogue $dialogue)
    {
        abort_if(Gate::denies('dialogue_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dialogue->delete();

        return back();
    }

    public function massDestroy(MassDestroyDialogueRequest $request)
    {
        Dialogue::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
