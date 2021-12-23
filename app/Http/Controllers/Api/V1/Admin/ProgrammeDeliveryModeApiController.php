<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgrammeDeliveryModeRequest;
use App\Http\Requests\UpdateProgrammeDeliveryModeRequest;
use App\Http\Resources\Admin\ProgrammeDeliveryModeResource;
use App\Models\ProgrammeDeliveryMode;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgrammeDeliveryModeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('programme_delivery_mode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProgrammeDeliveryModeResource(ProgrammeDeliveryMode::all());
    }

    public function store(StoreProgrammeDeliveryModeRequest $request)
    {
        $programmeDeliveryMode = ProgrammeDeliveryMode::create($request->all());

        return (new ProgrammeDeliveryModeResource($programmeDeliveryMode))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProgrammeDeliveryMode $programmeDeliveryMode)
    {
        abort_if(Gate::denies('programme_delivery_mode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProgrammeDeliveryModeResource($programmeDeliveryMode);
    }

    public function update(UpdateProgrammeDeliveryModeRequest $request, ProgrammeDeliveryMode $programmeDeliveryMode)
    {
        $programmeDeliveryMode->update($request->all());

        return (new ProgrammeDeliveryModeResource($programmeDeliveryMode))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProgrammeDeliveryMode $programmeDeliveryMode)
    {
        abort_if(Gate::denies('programme_delivery_mode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programmeDeliveryMode->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
