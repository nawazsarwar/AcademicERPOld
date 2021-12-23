<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignationTypeRequest;
use App\Http\Requests\UpdateDesignationTypeRequest;
use App\Http\Resources\Admin\DesignationTypeResource;
use App\Models\DesignationType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DesignationTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('designation_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesignationTypeResource(DesignationType::with(['parent'])->get());
    }

    public function store(StoreDesignationTypeRequest $request)
    {
        $designationType = DesignationType::create($request->all());

        return (new DesignationTypeResource($designationType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DesignationType $designationType)
    {
        abort_if(Gate::denies('designation_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesignationTypeResource($designationType->load(['parent']));
    }

    public function update(UpdateDesignationTypeRequest $request, DesignationType $designationType)
    {
        $designationType->update($request->all());

        return (new DesignationTypeResource($designationType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DesignationType $designationType)
    {
        abort_if(Gate::denies('designation_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designationType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
