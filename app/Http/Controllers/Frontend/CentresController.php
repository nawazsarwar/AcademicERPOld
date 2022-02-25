<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCentreRequest;
use App\Http\Requests\StoreCentreRequest;
use App\Http\Requests\UpdateCentreRequest;
use App\Models\Centre;
use App\Models\Faculty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CentresController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('centre_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centres = Centre::with(['faculty'])->get();

        return view('frontend.centres.index', compact('centres'));
    }

    public function create()
    {
        abort_if(Gate::denies('centre_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faculties = Faculty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.centres.create', compact('faculties'));
    }

    public function store(StoreCentreRequest $request)
    {
        $centre = Centre::create($request->all());

        return redirect()->route('frontend.centres.index');
    }

    public function edit(Centre $centre)
    {
        abort_if(Gate::denies('centre_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centre->load('faculty');

        return view('frontend.centres.edit', compact('centre'));
    }

    public function update(UpdateCentreRequest $request, Centre $centre)
    {
        $centre->update($request->all());

        return redirect()->route('frontend.centres.index');
    }

    public function show(Centre $centre)
    {
        abort_if(Gate::denies('centre_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centre->load('faculty');

        return view('frontend.centres.show', compact('centre'));
    }

    public function destroy(Centre $centre)
    {
        abort_if(Gate::denies('centre_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $centre->delete();

        return back();
    }

    public function massDestroy(MassDestroyCentreRequest $request)
    {
        Centre::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
