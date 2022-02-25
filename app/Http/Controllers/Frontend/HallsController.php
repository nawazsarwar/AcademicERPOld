<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHallRequest;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Models\Campus;
use App\Models\Hall;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HallsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('hall_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $halls = Hall::with(['campus'])->get();

        return view('frontend.halls.index', compact('halls'));
    }

    public function create()
    {
        abort_if(Gate::denies('hall_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campuses = Campus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.halls.create', compact('campuses'));
    }

    public function store(StoreHallRequest $request)
    {
        $hall = Hall::create($request->all());

        return redirect()->route('frontend.halls.index');
    }

    public function edit(Hall $hall)
    {
        abort_if(Gate::denies('hall_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campuses = Campus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hall->load('campus');

        return view('frontend.halls.edit', compact('campuses', 'hall'));
    }

    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $hall->update($request->all());

        return redirect()->route('frontend.halls.index');
    }

    public function show(Hall $hall)
    {
        abort_if(Gate::denies('hall_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hall->load('campus', 'hallHostels');

        return view('frontend.halls.show', compact('hall'));
    }

    public function destroy(Hall $hall)
    {
        abort_if(Gate::denies('hall_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hall->delete();

        return back();
    }

    public function massDestroy(MassDestroyHallRequest $request)
    {
        Hall::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
