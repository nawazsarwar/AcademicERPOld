<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgrammeDurationTypeRequest;
use App\Http\Requests\StoreProgrammeDurationTypeRequest;
use App\Http\Requests\UpdateProgrammeDurationTypeRequest;
use App\Models\ProgrammeDurationType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgrammeDurationTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('programme_duration_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programmeDurationTypes = ProgrammeDurationType::all();

        return view('admin.programmeDurationTypes.index', compact('programmeDurationTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('programme_duration_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.programmeDurationTypes.create');
    }

    public function store(StoreProgrammeDurationTypeRequest $request)
    {
        $programmeDurationType = ProgrammeDurationType::create($request->all());

        return redirect()->route('admin.programme-duration-types.index');
    }

    public function edit(ProgrammeDurationType $programmeDurationType)
    {
        abort_if(Gate::denies('programme_duration_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.programmeDurationTypes.edit', compact('programmeDurationType'));
    }

    public function update(UpdateProgrammeDurationTypeRequest $request, ProgrammeDurationType $programmeDurationType)
    {
        $programmeDurationType->update($request->all());

        return redirect()->route('admin.programme-duration-types.index');
    }

    public function show(ProgrammeDurationType $programmeDurationType)
    {
        abort_if(Gate::denies('programme_duration_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.programmeDurationTypes.show', compact('programmeDurationType'));
    }

    public function destroy(ProgrammeDurationType $programmeDurationType)
    {
        abort_if(Gate::denies('programme_duration_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programmeDurationType->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgrammeDurationTypeRequest $request)
    {
        ProgrammeDurationType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
