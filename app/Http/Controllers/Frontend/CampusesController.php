<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCampusRequest;
use App\Http\Requests\StoreCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use App\Models\Campus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CampusesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('campus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campuses = Campus::all();

        return view('frontend.campuses.index', compact('campuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('campus_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.campuses.create');
    }

    public function store(StoreCampusRequest $request)
    {
        $campus = Campus::create($request->all());

        return redirect()->route('frontend.campuses.index');
    }

    public function edit(Campus $campus)
    {
        abort_if(Gate::denies('campus_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.campuses.edit', compact('campus'));
    }

    public function update(UpdateCampusRequest $request, Campus $campus)
    {
        $campus->update($request->all());

        return redirect()->route('frontend.campuses.index');
    }

    public function show(Campus $campus)
    {
        abort_if(Gate::denies('campus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campus->load('campusHalls');

        return view('frontend.campuses.show', compact('campus'));
    }

    public function destroy(Campus $campus)
    {
        abort_if(Gate::denies('campus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campus->delete();

        return back();
    }

    public function massDestroy(MassDestroyCampusRequest $request)
    {
        Campus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
