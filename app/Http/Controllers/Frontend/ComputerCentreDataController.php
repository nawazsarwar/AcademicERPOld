<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComputerCentreDataRequest;
use App\Http\Requests\StoreComputerCentreDataRequest;
use App\Http\Requests\UpdateComputerCentreDataRequest;
use App\Models\ComputerCentreData;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComputerCentreDataController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('computer_centre_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $computerCentreDatas = ComputerCentreData::all();

        return view('frontend.computerCentreDatas.index', compact('computerCentreDatas'));
    }

    public function create()
    {
        abort_if(Gate::denies('computer_centre_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.computerCentreDatas.create');
    }

    public function store(StoreComputerCentreDataRequest $request)
    {
        $computerCentreData = ComputerCentreData::create($request->all());

        return redirect()->route('frontend.computer-centre-datas.index');
    }

    public function edit(ComputerCentreData $computerCentreData)
    {
        abort_if(Gate::denies('computer_centre_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.computerCentreDatas.edit', compact('computerCentreData'));
    }

    public function update(UpdateComputerCentreDataRequest $request, ComputerCentreData $computerCentreData)
    {
        $computerCentreData->update($request->all());

        return redirect()->route('frontend.computer-centre-datas.index');
    }

    public function show(ComputerCentreData $computerCentreData)
    {
        abort_if(Gate::denies('computer_centre_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.computerCentreDatas.show', compact('computerCentreData'));
    }

    public function destroy(ComputerCentreData $computerCentreData)
    {
        abort_if(Gate::denies('computer_centre_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $computerCentreData->delete();

        return back();
    }

    public function massDestroy(MassDestroyComputerCentreDataRequest $request)
    {
        ComputerCentreData::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
