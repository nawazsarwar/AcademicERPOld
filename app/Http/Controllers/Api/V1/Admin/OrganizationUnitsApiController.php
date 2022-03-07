<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganizationUnitRequest;
use App\Http\Requests\UpdateOrganizationUnitRequest;
use App\Http\Resources\Admin\OrganizationUnitResource;
use App\Models\OrganizationUnit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizationUnitsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('organization_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizationUnitResource(OrganizationUnit::all());
    }

    public function store(StoreOrganizationUnitRequest $request)
    {
        $organizationUnit = OrganizationUnit::create($request->all());

        return (new OrganizationUnitResource($organizationUnit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrganizationUnit $organizationUnit)
    {
        abort_if(Gate::denies('organization_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrganizationUnitResource($organizationUnit);
    }

    public function update(UpdateOrganizationUnitRequest $request, OrganizationUnit $organizationUnit)
    {
        $organizationUnit->update($request->all());

        return (new OrganizationUnitResource($organizationUnit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrganizationUnit $organizationUnit)
    {
        abort_if(Gate::denies('organization_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizationUnit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
