<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAdmissionChargeRequest;
use App\Http\Requests\StoreAdmissionChargeRequest;
use App\Http\Requests\UpdateAdmissionChargeRequest;
use App\Models\AdmissionCharge;
use App\Models\Course;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdmissionChargesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('admission_charge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionCharges = AdmissionCharge::with(['course'])->get();

        return view('admin.admissionCharges.index', compact('admissionCharges'));
    }

    public function create()
    {
        abort_if(Gate::denies('admission_charge_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.admissionCharges.create', compact('courses'));
    }

    public function store(StoreAdmissionChargeRequest $request)
    {
        $admissionCharge = AdmissionCharge::create($request->all());

        return redirect()->route('admin.admission-charges.index');
    }

    public function edit(AdmissionCharge $admissionCharge)
    {
        abort_if(Gate::denies('admission_charge_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admissionCharge->load('course');

        return view('admin.admissionCharges.edit', compact('admissionCharge', 'courses'));
    }

    public function update(UpdateAdmissionChargeRequest $request, AdmissionCharge $admissionCharge)
    {
        $admissionCharge->update($request->all());

        return redirect()->route('admin.admission-charges.index');
    }

    public function show(AdmissionCharge $admissionCharge)
    {
        abort_if(Gate::denies('admission_charge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionCharge->load('course');

        return view('admin.admissionCharges.show', compact('admissionCharge'));
    }

    public function destroy(AdmissionCharge $admissionCharge)
    {
        abort_if(Gate::denies('admission_charge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionCharge->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdmissionChargeRequest $request)
    {
        AdmissionCharge::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
