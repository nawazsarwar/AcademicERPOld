<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDegreeRequest;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use App\Models\Degree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DegreesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('degree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::all();

        return view('frontend.degrees.index', compact('degrees'));
    }

    public function create()
    {
        abort_if(Gate::denies('degree_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.degrees.create');
    }

    public function store(StoreDegreeRequest $request)
    {
        $degree = Degree::create($request->all());

        return redirect()->route('frontend.degrees.index');
    }

    public function edit(Degree $degree)
    {
        abort_if(Gate::denies('degree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.degrees.edit', compact('degree'));
    }

    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $degree->update($request->all());

        return redirect()->route('frontend.degrees.index');
    }

    public function show(Degree $degree)
    {
        abort_if(Gate::denies('degree_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.degrees.show', compact('degree'));
    }

    public function destroy(Degree $degree)
    {
        abort_if(Gate::denies('degree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->delete();

        return back();
    }

    public function massDestroy(MassDestroyDegreeRequest $request)
    {
        Degree::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
