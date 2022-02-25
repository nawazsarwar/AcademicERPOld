<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgrammeDeliveryModeRequest;
use App\Http\Requests\StoreProgrammeDeliveryModeRequest;
use App\Http\Requests\UpdateProgrammeDeliveryModeRequest;
use App\Models\ProgrammeDeliveryMode;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgrammeDeliveryModeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('programme_delivery_mode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programmeDeliveryModes = ProgrammeDeliveryMode::all();

        return view('frontend.programmeDeliveryModes.index', compact('programmeDeliveryModes'));
    }

    public function create()
    {
        abort_if(Gate::denies('programme_delivery_mode_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.programmeDeliveryModes.create');
    }

    public function store(StoreProgrammeDeliveryModeRequest $request)
    {
        $programmeDeliveryMode = ProgrammeDeliveryMode::create($request->all());

        return redirect()->route('frontend.programme-delivery-modes.index');
    }

    public function edit(ProgrammeDeliveryMode $programmeDeliveryMode)
    {
        abort_if(Gate::denies('programme_delivery_mode_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.programmeDeliveryModes.edit', compact('programmeDeliveryMode'));
    }

    public function update(UpdateProgrammeDeliveryModeRequest $request, ProgrammeDeliveryMode $programmeDeliveryMode)
    {
        $programmeDeliveryMode->update($request->all());

        return redirect()->route('frontend.programme-delivery-modes.index');
    }

    public function show(ProgrammeDeliveryMode $programmeDeliveryMode)
    {
        abort_if(Gate::denies('programme_delivery_mode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.programmeDeliveryModes.show', compact('programmeDeliveryMode'));
    }

    public function destroy(ProgrammeDeliveryMode $programmeDeliveryMode)
    {
        abort_if(Gate::denies('programme_delivery_mode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programmeDeliveryMode->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgrammeDeliveryModeRequest $request)
    {
        ProgrammeDeliveryMode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
