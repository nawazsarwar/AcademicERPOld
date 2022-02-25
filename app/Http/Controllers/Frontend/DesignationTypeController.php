<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDesignationTypeRequest;
use App\Http\Requests\StoreDesignationTypeRequest;
use App\Http\Requests\UpdateDesignationTypeRequest;
use App\Models\DesignationType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DesignationTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('designation_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designationTypes = DesignationType::with(['parent'])->get();

        return view('frontend.designationTypes.index', compact('designationTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('designation_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = DesignationType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.designationTypes.create', compact('parents'));
    }

    public function store(StoreDesignationTypeRequest $request)
    {
        $designationType = DesignationType::create($request->all());

        return redirect()->route('frontend.designation-types.index');
    }

    public function edit(DesignationType $designationType)
    {
        abort_if(Gate::denies('designation_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parents = DesignationType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $designationType->load('parent');

        return view('frontend.designationTypes.edit', compact('designationType', 'parents'));
    }

    public function update(UpdateDesignationTypeRequest $request, DesignationType $designationType)
    {
        $designationType->update($request->all());

        return redirect()->route('frontend.designation-types.index');
    }

    public function show(DesignationType $designationType)
    {
        abort_if(Gate::denies('designation_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designationType->load('parent');

        return view('frontend.designationTypes.show', compact('designationType'));
    }

    public function destroy(DesignationType $designationType)
    {
        abort_if(Gate::denies('designation_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designationType->delete();

        return back();
    }

    public function massDestroy(MassDestroyDesignationTypeRequest $request)
    {
        DesignationType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
