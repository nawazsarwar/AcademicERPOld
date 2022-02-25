<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdmissionEntranceTypeRequest;
use App\Http\Requests\StoreAdmissionEntranceTypeRequest;
use App\Http\Requests\UpdateAdmissionEntranceTypeRequest;
use App\Models\AdmissionEntranceType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdmissionEntranceTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admission_entrance_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionEntranceTypes = AdmissionEntranceType::all();

        return view('frontend.admissionEntranceTypes.index', compact('admissionEntranceTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('admission_entrance_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.admissionEntranceTypes.create');
    }

    public function store(StoreAdmissionEntranceTypeRequest $request)
    {
        $admissionEntranceType = AdmissionEntranceType::create($request->all());

        return redirect()->route('frontend.admission-entrance-types.index');
    }

    public function edit(AdmissionEntranceType $admissionEntranceType)
    {
        abort_if(Gate::denies('admission_entrance_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.admissionEntranceTypes.edit', compact('admissionEntranceType'));
    }

    public function update(UpdateAdmissionEntranceTypeRequest $request, AdmissionEntranceType $admissionEntranceType)
    {
        $admissionEntranceType->update($request->all());

        return redirect()->route('frontend.admission-entrance-types.index');
    }

    public function show(AdmissionEntranceType $admissionEntranceType)
    {
        abort_if(Gate::denies('admission_entrance_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.admissionEntranceTypes.show', compact('admissionEntranceType'));
    }

    public function destroy(AdmissionEntranceType $admissionEntranceType)
    {
        abort_if(Gate::denies('admission_entrance_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionEntranceType->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdmissionEntranceTypeRequest $request)
    {
        AdmissionEntranceType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
