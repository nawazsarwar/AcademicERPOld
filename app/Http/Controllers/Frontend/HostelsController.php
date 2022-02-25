<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHostelRequest;
use App\Http\Requests\StoreHostelRequest;
use App\Http\Requests\UpdateHostelRequest;
use App\Models\Hall;
use App\Models\Hostel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HostelsController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('hostel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostels = Hostel::with(['hall'])->get();

        return view('frontend.hostels.index', compact('hostels'));
    }

    public function create()
    {
        abort_if(Gate::denies('hostel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $halls = Hall::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.hostels.create', compact('halls'));
    }

    public function store(StoreHostelRequest $request)
    {
        $hostel = Hostel::create($request->all());

        return redirect()->route('frontend.hostels.index');
    }

    public function edit(Hostel $hostel)
    {
        abort_if(Gate::denies('hostel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $halls = Hall::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hostel->load('hall');

        return view('frontend.hostels.edit', compact('halls', 'hostel'));
    }

    public function update(UpdateHostelRequest $request, Hostel $hostel)
    {
        $hostel->update($request->all());

        return redirect()->route('frontend.hostels.index');
    }

    public function show(Hostel $hostel)
    {
        abort_if(Gate::denies('hostel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostel->load('hall');

        return view('frontend.hostels.show', compact('hostel'));
    }

    public function destroy(Hostel $hostel)
    {
        abort_if(Gate::denies('hostel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hostel->delete();

        return back();
    }

    public function massDestroy(MassDestroyHostelRequest $request)
    {
        Hostel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
