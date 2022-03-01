<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyReceivableRequest;
use App\Http\Requests\StoreReceivableRequest;
use App\Http\Requests\UpdateReceivableRequest;
use App\Models\Receivable;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceivablesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('receivable_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receivables = Receivable::with(['user', 'raised_by'])->get();

        return view('admin.receivables.index', compact('receivables'));
    }

    public function create()
    {
        abort_if(Gate::denies('receivable_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $raised_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.receivables.create', compact('raised_bies', 'users'));
    }

    public function store(StoreReceivableRequest $request)
    {
        $receivable = Receivable::create($request->all());

        return redirect()->route('admin.receivables.index');
    }

    public function edit(Receivable $receivable)
    {
        abort_if(Gate::denies('receivable_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $raised_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $receivable->load('user', 'raised_by');

        return view('admin.receivables.edit', compact('raised_bies', 'receivable', 'users'));
    }

    public function update(UpdateReceivableRequest $request, Receivable $receivable)
    {
        $receivable->update($request->all());

        return redirect()->route('admin.receivables.index');
    }

    public function show(Receivable $receivable)
    {
        abort_if(Gate::denies('receivable_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receivable->load('user', 'raised_by');

        return view('admin.receivables.show', compact('receivable'));
    }

    public function destroy(Receivable $receivable)
    {
        abort_if(Gate::denies('receivable_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receivable->delete();

        return back();
    }

    public function massDestroy(MassDestroyReceivableRequest $request)
    {
        Receivable::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
