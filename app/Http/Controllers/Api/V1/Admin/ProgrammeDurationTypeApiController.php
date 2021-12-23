<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgrammeDurationTypeRequest;
use App\Http\Requests\UpdateProgrammeDurationTypeRequest;
use App\Http\Resources\Admin\ProgrammeDurationTypeResource;
use App\Models\ProgrammeDurationType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgrammeDurationTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('programme_duration_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProgrammeDurationTypeResource(ProgrammeDurationType::all());
    }

    public function store(StoreProgrammeDurationTypeRequest $request)
    {
        $programmeDurationType = ProgrammeDurationType::create($request->all());

        return (new ProgrammeDurationTypeResource($programmeDurationType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProgrammeDurationType $programmeDurationType)
    {
        abort_if(Gate::denies('programme_duration_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProgrammeDurationTypeResource($programmeDurationType);
    }

    public function update(UpdateProgrammeDurationTypeRequest $request, ProgrammeDurationType $programmeDurationType)
    {
        $programmeDurationType->update($request->all());

        return (new ProgrammeDurationTypeResource($programmeDurationType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProgrammeDurationType $programmeDurationType)
    {
        abort_if(Gate::denies('programme_duration_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $programmeDurationType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
