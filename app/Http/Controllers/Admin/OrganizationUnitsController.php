<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrganizationUnitRequest;
use App\Http\Requests\StoreOrganizationUnitRequest;
use App\Http\Requests\UpdateOrganizationUnitRequest;
use App\Models\OrganizationUnit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizationUnitsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('organization_unit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizationUnits = OrganizationUnit::all();

        return view('admin.organizationUnits.index', compact('organizationUnits'));
    }

    public function create()
    {
        abort_if(Gate::denies('organization_unit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organizationUnits.create');
    }

    public function store(StoreOrganizationUnitRequest $request)
    {
        $organizationUnit = OrganizationUnit::create($request->all());

        return redirect()->route('admin.organization-units.index');
    }

    public function edit(OrganizationUnit $organizationUnit)
    {
        abort_if(Gate::denies('organization_unit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organizationUnits.edit', compact('organizationUnit'));
    }

    public function update(UpdateOrganizationUnitRequest $request, OrganizationUnit $organizationUnit)
    {
        $organizationUnit->update($request->all());

        return redirect()->route('admin.organization-units.index');
    }

    public function show(OrganizationUnit $organizationUnit)
    {
        abort_if(Gate::denies('organization_unit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.organizationUnits.show', compact('organizationUnit'));
    }

    public function destroy(OrganizationUnit $organizationUnit)
    {
        abort_if(Gate::denies('organization_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organizationUnit->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganizationUnitRequest $request)
    {
        OrganizationUnit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
