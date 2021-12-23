<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmissionChargeRequest;
use App\Http\Requests\UpdateAdmissionChargeRequest;
use App\Http\Resources\Admin\AdmissionChargeResource;
use App\Models\AdmissionCharge;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdmissionChargesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admission_charge_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdmissionChargeResource(AdmissionCharge::with(['course'])->get());
    }

    public function store(StoreAdmissionChargeRequest $request)
    {
        $admissionCharge = AdmissionCharge::create($request->all());

        return (new AdmissionChargeResource($admissionCharge))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AdmissionCharge $admissionCharge)
    {
        abort_if(Gate::denies('admission_charge_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdmissionChargeResource($admissionCharge->load(['course']));
    }

    public function update(UpdateAdmissionChargeRequest $request, AdmissionCharge $admissionCharge)
    {
        $admissionCharge->update($request->all());

        return (new AdmissionChargeResource($admissionCharge))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AdmissionCharge $admissionCharge)
    {
        abort_if(Gate::denies('admission_charge_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissionCharge->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
