<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNomineeRequest;
use App\Http\Requests\StoreNomineeRequest;
use App\Http\Requests\UpdateNomineeRequest;
use App\Models\Employee;
use App\Models\Nominee;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NomineesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('nominee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nominees = Nominee::with(['employee'])->get();

        return view('frontend.nominees.index', compact('nominees'));
    }

    public function create()
    {
        abort_if(Gate::denies('nominee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.nominees.create', compact('employees'));
    }

    public function store(StoreNomineeRequest $request)
    {
        $nominee = Nominee::create($request->all());

        return redirect()->route('frontend.nominees.index');
    }

    public function edit(Nominee $nominee)
    {
        abort_if(Gate::denies('nominee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employees = Employee::pluck('employee_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nominee->load('employee');

        return view('frontend.nominees.edit', compact('employees', 'nominee'));
    }

    public function update(UpdateNomineeRequest $request, Nominee $nominee)
    {
        $nominee->update($request->all());

        return redirect()->route('frontend.nominees.index');
    }

    public function show(Nominee $nominee)
    {
        abort_if(Gate::denies('nominee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nominee->load('employee');

        return view('frontend.nominees.show', compact('nominee'));
    }

    public function destroy(Nominee $nominee)
    {
        abort_if(Gate::denies('nominee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nominee->delete();

        return back();
    }

    public function massDestroy(MassDestroyNomineeRequest $request)
    {
        Nominee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
